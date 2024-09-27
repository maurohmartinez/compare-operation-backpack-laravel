<?php

namespace MHMartinez\CompareOperation;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

trait CompareOperation
{
    protected function setupCompareRoutes(string $segment, string $routeName, string $controller): void
    {
        Route::get($segment . '/compare/{firstId}/{secondId}', [
            'as' => $routeName . '.compare',
            'uses' => $controller . '@compare',
            'operation' => 'compare',
        ]);
    }

    protected function setupCompareDefaults(): void
    {
        $this->crud->allowAccess('compare');

        $this->crud->operation('compare', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation('list', function () {
            $this->crud->enableBulkActions();
            $this->crud->addButton('bottom', 'bulk_compare', 'view', 'compare-operation::buttons.compare');
        });
    }

    public function compare(int $firstId, int $secondId): View
    {
        $this->crud->hasAccessOrFail('compare');

        if ($this->crud->get('show.softDeletes') && in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($this->crud->model))) {
            $this->data['entry'] = $this->crud->getModel()->withTrashed()->findOrFail($firstId);
            $this->data['entry1'] = $this->crud->getModel()->withTrashed()->findOrFail($secondId);
        } else {
            $this->data['entry'] = $this->crud->getModel()->findOrFail($firstId);
            $this->data['entry1'] = $this->crud->getModel()->findOrFail($secondId);
        }

        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->getTitle() ?? 'Comparing entries';

        return view('compare-operation::compare', $this->data);
    }
}

<?php

namespace MHMartinez\CompareOperation\app\Http\Controllers\Operations;

use Illuminate\Support\Facades\Route;

trait CompareOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param  string  $segment  Name of the current entity (singular). Used as first URL segment.
     * @param  string  $routeName  Prefix of the route name.
     * @param  string  $controller  Name of the current CrudController.
     */
    protected function setupCompareRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/compare/{first_id}/{second_id}', [
            'as'        => $routeName.'.compare',
            'uses'      => $controller.'@compare',
            'operation' => 'compare',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupCompareDefaults()
    {
        $this->crud->allowAccess('compare');

        $this->crud->operation('compare', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setupDefaultSaveActions();
        });

        $this->crud->operation('list', function () {
            $this->crud->enableBulkActions();
            $this->crud->addButton('bottom', 'bulk_compare', 'view', 'compare-operation::buttons.compare');
        });
    }

    /**
     * Show the form for creating inserting a new row.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function compare()
    {
        $this->crud->hasAccessOrFail('compare');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->crud->getSaveAction();
        $this->data['title'] = $this->crud->getTitle() ?? trans('backpack::crud.add').' '.$this->crud->entity_name;

        return view('', $this->data);
    }
}

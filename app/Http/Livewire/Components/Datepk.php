<?php

namespace App\Http\Livewire\Components;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class Datepk extends Component
{
    public $origDate;
    public $entityId;
    public $inid;
    public $shortId;
    public $date; // dirty operation name state
    public $isName; // determines whether to display it in bold text
    public string $field; // this is can be column. It comes from the blade-view foreach($fields as $field)
    public string $model; // Eloquent model with full name-space

    public function mount($model, $entity)
    {
        $this->entityId = $entity->id;
        $this->shortId  =  $entity->shortId;
        $this->origDate = $entity->{$this->field};
        $this->init($this->model, $entity); // initialize the component state
    }
public function updatedDate(){

}
    public function save()
    {
        $entity = $this->model::findOrFail($this->entityId);
        // dd(  $entity);
        $date  =  Carbon::parse($this->date)->toFormattedDate();
        $date = $date === $this->shortId ? null : $date; // don't save it as operation name it if it's identical to the short_id

        $entity->{$this->field} =  $date ?? null;
        dd($entity->{$this->field}, $date);
        $entity->save();
        $this->init($this->model, $entity); // re-initialize the component state with fresh data after saving
        $this->dispatchBrowserEvent('successmsg',['msg' =>  Str::studly($this->field).' successfully updated!']);
    }

    private function init($model, $entity)
    {
        $this->origDate = $entity->{$this->field} ?: $this->shortId;
        $this->date     = $this->origDate;
        $this->isName   = $entity->{$this->field} ?? false;
    }

    public function render()
    {
        return view('livewire.components.datepk');
    }
}

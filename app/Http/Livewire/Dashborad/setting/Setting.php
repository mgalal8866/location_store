<?php

namespace App\Http\Livewire\Dashborad\setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use JoeDixon\Translation\Drivers\Translation;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\setting as ModelsSetting;
use Illuminate\Support\Facades\Cache;
class Setting extends Component
{
    use WithFileUploads;
    public $logo,$favicon,$timebackup;
    use GeneralTrait;

    private $translation;
    public $state = [];
    public function mount(Translation $translation)
    {
        $setting = ModelsSetting::first();

        if ($setting) {
            $this->state = $setting->toArray();
        }
        // $this->translation = $translation;
    }

        // public function submit(){
        //     if ($this->logo != null){
        //         $this->logo = $this->uploadimages('assets',$this->logo);
        //         // config()->set('setting_var.images.logo', $this->logo);
        //         config(['setting_var.images.logo' => $this->logo]);
        //     }
        //     if ($this->favicon != null){
        //         $this->favicon = $this->uploadimages('assets',$this->favicon);
        //         config()->set('setting_var.images.favicon', $this->favicon);
        //     }
        //     if ($this->favicon != null || $this->logo != null){
        //     session()->flash('message', 'Save Changes');
        //     }

        // }
        public function setbackuptime()
        {

            dd($this->timebackup);
        }
        public function updateSetting()
        {
            $setting = ModelsSetting::first();

            if ($setting) {
                $setting->update($this->state);
            } else {
                ModelsSetting::create($this->state);
            }

            Cache::forget('setting');
            $this->dispatchBrowserEvent('successmsg',['msg' => 'Settings updated successfully!']);
                  }
    public function render()
    {

        // $languages =  $this->translation->allLanguages();

        return view('livewire.dashborad.setting.setting')->layout('admin.layouts.masterdash');
    }
}

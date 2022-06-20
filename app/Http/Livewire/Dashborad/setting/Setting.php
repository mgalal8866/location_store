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
    public $i =0;
    public $state = [];
    public $settings_sections,   $section = 'general' ,$settings,$setting ,$valueform=[];
    public function mount(Translation $translation)
    {

        // $section = (isset(\request()->section) && \request()->section != '') ? \request()->section : 'general';


        // if ($setting) {
        //     $this->state = $setting->toArray();
        // }

    }
    public function up(){
        dd($this->valueform);
        // for ($i = 0; $i < count($request->id); $i++) {
        //     $input['value'] = isset($request->value[$i]) ? $request->value[$i] : null;
        //     Setting::whereId($request->id[$i])->first()->update($input);
        // }
        // $this->generateCache();
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
                        $this->i == 0;
                        $this->settings_sections = ModelsSetting::select('section')->distinct()->pluck('section');
                        $this->settings = ModelsSetting::whereSection($this->section)->get();
                        $this->setting = ModelsSetting::first();
                        foreach($this->settings as $settingitem)
                        {
                            $this->valueform[$this->i]['value'] = $settingitem->value ;
                            $this->i +=  1;
                        }
                        return view('livewire.dashborad.setting.setting')->layout('admin.layouts.masterdash');
                    }
}

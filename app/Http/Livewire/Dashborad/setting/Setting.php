<?php

namespace App\Http\Livewire\Dashborad\setting;
use App\Models\tasklog;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\DB;
use App\Models\setting as ModelsSetting;
use App\Http\Controllers\Api\Traits\GeneralTrait;

class Setting extends Component
{
    use WithFileUploads;
    public $logo,$favicon,$timebackup;
    use GeneralTrait;

    private $translation;
    public $i =0;
    public $state = [];

    public $codetext,$importsplash, $images, $settings_sections, $backupgoogle,  $section = 'general' ,$settings,$setting ,$valueform ,$notifytime;

    public function mount()
    {


        $this->notifytime = gettaskvar('notify');
        $this->backupgoogle = gettaskvar('backupgoogle');
        $this->reset('i');
        $this->reset('valueform');
        $this->settings_sections = ModelsSetting::whereShow(0)->select('section')->distinct()->pluck('section');
        $hassetting = ModelsSetting::whereShow(0)->get();
        foreach($hassetting as $settingitem)
        {
            $this->valueform[$this->i]['value'] = $settingitem->value ;
            $this->valueform[$this->i]['id'] = $settingitem->id ;
            $this->valueform[$this->i]['key'] = $settingitem->key ;
            $this->valueform[$this->i]['type'] = $settingitem->type ;
            $this->i +=  1;
        }
        $this->settings = $hassetting;
    }
    //###############################################
    public function UpdatedSection(){
            $this->reset('i');
            $this->reset('valueform');
            $hassetting = ModelsSetting::whereShow(0)->whereSection($this->section)->get();
            foreach($hassetting  as $settingitem)
            {
                $this->valueform[$this->i]['value'] = $settingitem->value ;
                $this->valueform[$this->i]['id']    = $settingitem->id ;
                $this->valueform[$this->i]['key']   = $settingitem->key ;
                $this->valueform[$this->i]['type']  = $settingitem->type ;
                $this->i +=  1;
            }
            $this->settings = $hassetting;


    }
    public function clearall(){
        DB::table('tasklogs')->delete();
        $this->dispatchBrowserEvent('infomsg',['msg' => 'Clear all Done']);
    }
    public function up($section){
        // dd($this->codetext);
        foreach($this->valueform as $item)
            {
                if($item['key'] == 'privacy'){
                    $item['value'] = $this->codetext ;
                }

                $settings = Valuestore::make(config_path('settings.json'));
                $setsetting = ModelsSetting::whereShow(0)->whereSection($this->section)->whereId($item['id'])->first();
                $setsetting->update($item);
                $settings->put($setsetting->key, $item['value']);
            }
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Settings updated successfully!']);
    }
    //###################### تعديل خاص بال تاسك ملف taskvar #######################
    public function UpdatedBackupgoogle(){
        $settings = Valuestore::make(config_path('taskvar.json'));
        $settings->put('backupgoogle', $this->backupgoogle);
        $this->dispatchBrowserEvent('successmsg',['msg' => 'Backup Time Updated successfully!']);
    }
    public function UpdatedNotifytime(){
        $settings = Valuestore::make(config_path('taskvar.json'));
        $settings->put('notify', $this->notifytime);
        $this->dispatchBrowserEvent('successmsg',['msg' => 'notify Time Updated successfully!']);
    }
    //###################### تعديل خاص بال تاسك ملف taskvar #######################


        public function uploadsplash()
        {
          $slpash =  ModelsSetting::where('key','splash_screen')->first();

          deleteimage('splash',$slpash->value);
          $this->importsplash = $this->uploadimages('splash',$this->importsplash);
          $slpash->update(['value' =>  $this->importsplash ]);
          $this->dispatchBrowserEvent('successmsg',['msg' => 'uploaded Done']);
        }

        public function render()
        {
            $this->images = ModelsSetting::where('key','splash_screen')->first()->value;
            $tasklog = tasklog::latest()->paginate(10);
            return view('livewire.dashborad.setting.setting',['tasklog' =>$tasklog ])->layout('admin.layouts.masterdash');
        }
}

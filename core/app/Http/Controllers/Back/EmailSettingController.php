<?php
namespace App\Http\Controllers\Back;
use App\{
  Models\EmailTemplate,
  Http\Controllers\Controller
};
use App\Models\Setting;
use Illuminate\Http\Request;
class EmailSettingController extends Controller{
  public function __construct(){
    $this->middleware('adminlocalize');
    $this->middleware('auth:admin');
  }
  public function email(){
    return view('back.settings.email',[
      'datas' => EmailTemplate::get()
    ]);
  }
  public function edit(EmailTemplate $template){
    return view('back.email_template.edit',compact('template'));
  }
  public function emailUpdate(Request $request){
    $request->validate([
      "email_host" => "required:max:200",
      "email_port" => "required|max:10",
      "email_encryption" => "required|max:10",
      "email_user" => "required|max:100",
      "email_pass" => "required|max:100",
      "email_from" => "required|max:100",
      "email_from_name" => "required|max:100",
      "contact_email" => "required|max:100",
    ]);

    $input = $request->all();
    if(isset($request['smtp_check'])){
    $input['smtp_check'] = 1;
    }else{
    $input['smtp_check'] = 0;
    }
    Setting::first()->update($input);
    return redirect()->back()->withSuccess(__('Data Updated Successfully.'));
  }
  public function update(Request $request,EmailTemplate $template){
    $template->update($request->all());
    return redirect()->route('back.setting.email')->withSuccess(__('Email Template Updated Successfully.'));
  }
}

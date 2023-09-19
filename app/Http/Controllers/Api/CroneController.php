<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\Viewuser;
use App\Models\Task;
use App\Models\TaskProgres;
use App\Models\ProjectUser;
use App\Models\Project;
use App\Models\TaskFile;
use App\Models\Croneproject;
use App\Models\User;
use App\Events\KirimCreated;  
use PDF;

class CroneController extends BaseController
{
    
    public function tokennya(request $request)
    {
        // error_reporting(0);
        print_r(post_tokennya());
        
    }
    public function notif(request $request)
    {
        $to=93;
        $tipe=1;
        $notifikasi='Task baru';
        $project_id=1;
        $data=post_notifikasi($to,$notifikasi,$tipe,$project_id);
        KirimCreated::dispatch($data);
        
    }
    public function crone_user(request $request)
    {
        error_reporting(0);
        try{
            $json = file_get_contents('http://localhost/dki/orensum/public/api/crone_user');
            $decoded_json = json_decode($json, false);
            $data=$decoded_json;
            
            foreach($data as $item){
                    if(repleace_job($item->name)=='PNS'){
                        $role_id=3;
                        $atribut_id=2;
                    }else{
                        $role_id=2;
                        $atribut_id=1;
                    }
                    if(repleace_job($item->name)=='TAJKT1'){
                        $kategori_ta_id=1;
                    }else{
                        $kategori_ta_id=2;
                    }
                    $data=User::UpdateOrcreate(
                        [
                            'email'=>$item->email,
                        ],
                        [
                            
                            'name'=>repleace_name($item->name),
                            'jobs'=>repleace_job($item->name),
                            'last_name'=>$item->last_name,
                            'short_name'=>$item->short_name,
                            'photo'=>$item->photo,
                            'role_id'=>$role_id,
                            'kategori_ta_id'=>$kategori_ta_id,
                            'atribut_id'=>$atribut_id,
                            'jabatan_id'=>1,
                            'password'=>Hash::make(md5('admin123')),
                            'password_token'=>encoder('admin123'),
                            'created_at'=>$item->created_at,
                            'updated_at'=>$item->updated_at,
                        ]
                    );
                    
                
            }
            // $ust=User::where('role_id',2)->get();
            // foreach($ust as $os){
                
            //     $upd=User::where('id',$os->id)->update([

            //     ]);
            // }
             $success="ok";
             $count=count((array) $data).' Success Upload';
             return $this->sendResponse($count, 'success');
        } catch(\Exception $e){
            return $this->sendResponseerror($e->getMessage());
        }
    }
    public function crone_user_update(request $request)
    {
        error_reporting(0);
        try{
            
                    $data=User::UpdateOrcreate(
                        [
                            'email'=>$request->email,
                        ],
                        [
                            
                            'password'=>Hash::make(md5($request->text)),
                            'updated_at'=>$item->updated_at,
                        ]
                    );
                    
                
            
             $success="ok";
             $count=count((array) $data).' Success Upload';
             return $this->sendResponse($count, 'success');
        } catch(\Exception $e){
            return $this->sendResponseerror($e->getMessage());
        }
    }

    public function crone_project(request $request)
    {
        error_reporting(0);
        try{
            $json = file_get_contents('https://dcktrp.jakarta.go.id/monitoring-project/api/crone_project');
            $decoded_json = json_decode($json, false);
            $data=$decoded_json;
            
            foreach($data as $item){
                
                    $data=Project::UpdateOrcreate(
                        [
                            'ide'=>$item->ide,
                        ],
                        [
                            
                            'name'=>$item->name,
                            'act'=>1,
                            'description'=>$item->description,
                            'status_project_id'=>$item->status_project_id,
                            'thumbnail'=>$item->thumbnail,
                            'users_id'=>$item->users_id,
                            'start_date'=>$item->start_date,
                            'end_date'=>$item->end_date,
                            'short_name'=>$item->short_name,
                            'active'=>$item->active,
                            'estimated_hours'=>$item->estimated_hours,
                            'priority_id'=>$item->priority_id,
                            'created_at'=>$item->created_at,
                            'updated_at'=>$item->updated_at,
                        ]
                    );
                    
                
            }
             $success="ok";
             $count=count((array) $data).' Success Upload';
             return $this->sendResponse($count, 'success');
        } catch(\Exception $e){
            return $this->sendResponseerror($e->getMessage());
        }
        
        return response()->json($data, 200);
    }

    public function crone_project_user(request $request)
    {
        error_reporting(0);
        try{
            $json = file_get_contents('https://dcktrp.jakarta.go.id/monitoring-project/api/crone_project_user');
            $decoded_json = json_decode($json, false);
            $data=$decoded_json;
            
            foreach($data as $item){
                    if(in_array($item->users_id,job_pns())){
                        $role_id=1;
                    }else{
                        $role_id=2;
                    }
                    $data=ProjectUser::UpdateOrcreate(
                        [
                            'ide'=>$item->id,
                        ],
                        [
                            
                            'project_id'=>project_id($item->project_id),
                            'users_id'=>$item->users_id,
                            'role_project'=>$role_id,
                            'active'=>1,
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s'),
                        ]
                    );
                    
                
            }
             $success="ok";
             $count=count((array) $data).' Success Upload';
             return $this->sendResponse($count, 'success');
        } catch(\Exception $e){
            return $this->sendResponseerror($e->getMessage());
        }
        
        return response()->json($data, 200);
    }

    public function crone_task(request $request)
    {
        error_reporting(0);
        try{
            $json = file_get_contents('https://dcktrp.jakarta.go.id/monitoring-project/api/crone_task');
            $decoded_json = json_decode($json, false);
            $data=$decoded_json;
            
            foreach($data as $no=>$item){
                    if($item->created_at=='0000-00-00 00:00:00'){
                        $created_at=date('Y-m-d H:i:s');
                    }else{
                        $created_at=$item->created_at;
                    }
                    if($item->actual_created_at=='0000-00-00 00:00:00'){
                        $last_update=date('Y-m-d H:i:s');
                    }else{
                        if($item->actual_created_at==null || $item->actual_created_at==""){
                            $last_update=$created_at;
                        }else{
                            $last_update=$item->actual_created_at;
                        }
                    }
                    if($item->due_date==null){
                        $due_date=$created_at;
                    }else{
                        $due_date=$item->due_date;
                    }
                    if($item->priority=="" || $item->priority=null){
                        $priority=null;
                    }else{
                        $priority=$item->priority;
                    }
                    if($item->task_status==3 || $item->task_status==4){
                        $status_approve_pic=1;
                        $performance=100;
                    }else{
                        $status_approve_pic=0;
                        $performance=$item->task_progres;
                    }
                    $overdue_time=selisih_waktu_time($due_date,$last_update,'H');
                    $overdue_days=selisih_waktu_time($due_date,$last_update,'D');
                    if($overdue_time>0){
                        $bytarget=((80-$overdue_days)*30)/100;
                        $nilai_target=(80-$overdue_days)/100;
                    }else{
                        if($overdue_time==0){
                            $bytarget=(80*30)/100;
                            $nilai_target=80;
                        }else{
                            $bytarget=30;
                            $nilai_target=100;
                        }
                        
                    }  
                    if($overdue_days>0){
                        if($overdue_days>5 && $overdue_days<8){
                            $bykepuasan=(70*70)/100;
                            $nilai_kepuasan=70;
                        }elseif($overdue_days>7 && $overdue_days<15){
                            $bykepuasan=(60*70)/100;
                            $nilai_kepuasan=60;
                        }else{
                            $bykepuasan=(50*70)/100;
                            $nilai_kepuasan=50;
                        }
                        
                    }else{
                        $bykepuasan=70;
                        $nilai_kepuasan=100;
                        
                    } 
                    $data=Task::UpdateOrcreate(
                        [
                            'ide'=>$item->id,
                            
                        ],
                        [
                            
                            'project_id'=>project_id($item->project_id),
                            'users_id'=>$item->users_id,
                            'status_task_id'=>$item->task_status,
                            'urut'=>1,
                            'task'=>$item->task,
                            'assign_to'=>$item->assign_to,
                            'priority'=>$priority,
                            'bytarget'=>$bytarget,
                            'nilai_target'=>$nilai_target,
                            'bykepuasan'=>$bykepuasan,
                            'nilai_kepuasan'=>$nilai_kepuasan,
                            'overdue_time'=>$overdue_time,
                            'overdue_days'=>$overdue_days,
                            'performance'=>$performance,
                            'status_approve_pic'=>$status_approve_pic,
                            'progres'=>$item->task_progres,
                            'type_id'=>$item->type_id,
                            'start_task'=>$created_at,
                            'startup'=>1,
                            'due_date'=>$due_date,
                            'description'=>$item->description,
                            'est_hour'=>$item->est_hour,
                            'hours'=>$item->hours,
                            'verify'=>1,
                            'type_id'=>$item->type_id,
                            'created_at'=>$created_at,
                            'updated_at'=>$created_at,
                            'last_update'=>$last_update,
                        ]
                    );
                    
                
            }
            $proj=Project::orderBy('id','Asc')->get();
                foreach($proj as $pr){
                    $task=Task::where('project_id',$pr->id)->get();
                    foreach($task as $nx=>$gr){
                        
                        $data=Task::UpdateOrcreate(
                            [
                                'id'=>$gr->id,
                                
                            ],
                            [
                                
                                'urut'=>($nx+1),
                                
                            ]
                        );
                    }
                }
             $success="ok";
             $count=count((array) $data).' Success Upload';
             return $this->sendResponse($count, 'success');
        } catch(\Exception $e){
            return $this->sendResponseerror($e->getMessage());
        }
        
        return response()->json($data, 200);
    }

    public function crone_task_progres(request $request)
    {
        error_reporting(0);
        try{
            $json = file_get_contents('https://dcktrp.jakarta.go.id/monitoring-project/api/crone_task_progres');
            $decoded_json = json_decode($json, false);
            $data=$decoded_json;
            
            foreach($data as $item){
                    if($item->description==null || $item->description==""){
                        $comment='Update progres and status';
                    }else{
                        $comment=$item->description;
                    }
                    $data=TaskProgres::UpdateOrcreate(
                        [
                            'ide'=>$item->id,
                        ],
                        [
                            
                            'project_id'=>project_id($item->project_id),
                            'users_id'=>$item->users_id,
                            'status_task_id'=>$item->task_status,
                            'message'=>$item->task_name,
                            'assign_to'=>$item->assign_to,
                            'task_id'=>task_id($item->ide),
                            'progres'=>$item->progres,
                            'comment'=>$comment,
                            'created_at'=>$item->created_at,
                            'updated_at'=>$item->updated_at,
                        ]

                    );
                    
                
            }
             $success="ok";
             $count=count((array) $data).' Success Upload';
             return $this->sendResponse($count, 'success');
        } catch(\Exception $e){
            return $this->sendResponseerror($e->getMessage());
        }
        
        return response()->json($data, 200);
    }

    public function crone_task_file(request $request)
    {
        error_reporting(0);
        try{
            $json = file_get_contents('http://localhost/dki/orensum/public/api/crone_task_file');
            $decoded_json = json_decode($json, false);
            $data=$decoded_json;
            
            foreach($data as $item){
                
                    $data=TaskFile::UpdateOrcreate(
                        [
                            'ide'=>$item->id,
                        ],
                        [
                            
                            'project_id'=>project_id($item->project_id),
                            'task_id'=>task_id($item->task_id),
                            'task_progres_id'=>task_progres_id($item->easycase_id),
                            'created_at'=>$item->created,
                            'file'=>$item->file,
                            'upload_name'=>$item->upload_name,
                            'thumb'=>$item->thumb,
                            'file_size'=>$item->file_size,
                            'location'=>2,
                        ]

                    );
                    
                
            }
             $success="ok";
             $count=count((array) $data).' Success Upload';
             return $this->sendResponse($count, 'success');
        } catch(\Exception $e){
            return $this->sendResponseerror($e->getMessage());
        }
        
        return response()->json($data, 200);
    }

    
    
}

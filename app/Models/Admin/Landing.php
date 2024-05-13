<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;

    protected $table = 'landings';
    protected $guarded = false;

    public function main_img_change($file) {
        if(!empty($this->main_img)){
            $file_path = storage_path('app/' . $this->main_img);
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $file = $file;
        $uploaded_file_path = $file->store('landing/img', 'public');
        return $uploaded_file_path;
    }

    public function case1_img_change($file) {
        if(!empty($this->case1_img)){
            $file_path = storage_path('app/' . $this->case1_img);
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $file = $file;
        $uploaded_file_path = $file->store('landing/img', 'public');
        return $uploaded_file_path;
    }

    public function case2_img_change($file) {
        if(!empty($this->case2_img)){
            $file_path = storage_path('app/' . $this->case2_img);
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $file = $file;
        $uploaded_file_path = $file->store('landing/img', 'public');
        return $uploaded_file_path;
    }

    public function solution_img_change($file) {
        if(!empty($this->solution_img)){
            $file_path = storage_path('app/' . $this->solution_img);
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $file = $file;
        $uploaded_file_path = $file->store('landing/img', 'public');
        return $uploaded_file_path;
    }

    public function process_step1_img_change($file) {
        if(!empty($this->process_step1_img)){
            $file_path = storage_path('app/' . $this->process_step1_img);
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $file = $file;
        $uploaded_file_path = $file->store('landing/img', 'public');
        return $uploaded_file_path;
    }

    public function process_step2_img_change($file) {
        if(!empty($this->process_step2_img)){
            $file_path = storage_path('app/' . $this->process_step2_img);
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $file = $file;
        $uploaded_file_path = $file->store('landing/img', 'public');
        return $uploaded_file_path;
    }

    public function process_step3_img_change($file) {
        if(!empty($this->process_step3_img)){
            $file_path = storage_path('app/' . $this->process_step3_img);
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $file = $file;
        $uploaded_file_path = $file->store('landing/img', 'public');
        return $uploaded_file_path;
    }
}

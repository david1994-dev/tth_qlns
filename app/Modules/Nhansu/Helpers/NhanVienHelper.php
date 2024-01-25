<?php

namespace App\Modules\Nhansu\Helpers;
use Illuminate\Support\Facades\DB;
class NhanVienHelper
{
    public static function renderTTHEmail($hoten)
    {
        $noidungtenrieng = $hoten;
        $noidungtenrieng = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|é|ế)/", 'e', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(đ)/", 'd', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(Đ)/", 'D', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/(é)/", 'e', $noidungtenrieng);

        //   $noidungtenrieng = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $noidungtenrieng);
        $noidungtenrieng = preg_replace("/( )/", '_', $noidungtenrieng);
        $tenrieng = strtolower(str_replace(' ', '_', $noidungtenrieng));
        $phanthichchuoiten = explode('_', $tenrieng);
        $get_chucaidaucuaten = implode('', array_map(function ($v) {
            return $v[0];
        }, explode('_', $tenrieng)));

        $tengoiy = substr(end($phanthichchuoiten).$get_chucaidaucuaten, 0, -1);
        $email_get_view =  $tengoiy.'@tthgroup.vn';
        $checkemail = DB::table('nhanvien')->where('email', $email_get_view)->exists();
        if ($checkemail) {
            $getemail_moinhat = DB::table('nhanvien')->where('email', 'like', '%' . $tengoiy . '%')->count();
            if ($getemail_moinhat == 0) {
                $getemail_moinhat = '';
            }else{
                $getemail_moinhat = $getemail_moinhat+1;
            }
            $tengoiy = $tengoiy.$getemail_moinhat;
        }


        return $tengoiy.'@tthgroup.vn';
    }
}

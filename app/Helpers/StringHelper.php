<?php

namespace App\Helpers;

class StringHelper
{
    /**
     * Format input string where like
     */
    public function formatStringWhereLike($string){
        return addcslashes($string,'%_\\');
    }

    /**
	* Escape html
    * @param string $str
    * @return string
	*/
	public static function escapeHtml($str) {
        $search = ['<', '>'];
        $replace = ['&lt;', '&gt'];
        return str_replace($search, $replace, $str);
	}

    /**
     * Generate API
     * @return string
     */
    public static function generateAPI(){
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 25);
    }

    public static function getQRcodeLink($bank, $acountNummber, $bankName = '', $note = ''){
        $url ="https://img.vietqr.io/image/$bank-$acountNummber-print.png?accountName=$bankName&addInfo=$note";
        return $url;
    }

    public static function getUserRole($ugroup)
    {
        $ugroups = [0 => 'Thành viên', 1 => 'Cộng tác viên', 2 => 'Đại lý', 3 => 'Nhà phân phối'];

        if (array_key_exists($ugroup, $ugroups)) {
            return $ugroups[$ugroup];
        } else {
            return 'Không xác định';
        }
    }

}

<?php
namespace App\Libraries;

use App\Models\UserModel;

class UserService {

    public function getUserPref_categoryId($userId) {
        $userModel = new UserModel();
		$user = $userModel->asObject()->find($userId);
        if($user->preferences != null){
            $userPref = json_decode($user->preferences);
            $categoryId = $userPref->category_id;
            return $categoryId;
        }else{
            return null;
        }
    }

    private function getStatsXpFor1Day($userId, $offsetDay){
        $db = \Config\Database::connect();
        $request = 'SELECT sum(xp) as sum_xp from success_content '.
            ' WHERE user_id = ' . $userId .
            ' and DATE_FORMAT(dateRealization, \'%Y%m%d\') = DATE_FORMAT(CURRENT_DATE - INTERVAL '.$offsetDay.' DAY, \'%Y%m%d\')';
        //log_message('debug','[UserService.php] getStatsXpFor1Day: request ' . $request);
        $query = $db->query($request);
        $result = $query->getResult()[0]->sum_xp;
        //log_message('debug','[UserService.php] getStatsXpFor1Day: result ' . $result);
        if($result == ""){
            return 0;
        }
        return $result;
    }

    public function getStatsXp7Days($userId) : array {
        //log_message('debug','[UserService.php] getStatsXp7Days: i ' . $i);
        $resultArray = [];
        for($i=6; $i>=0; $i--){
            $xpOneDay = $this->getStatsXpFor1Day($userId, $i);
            //log_message('debug','[UserService.php] getStatsXp7Days: xpOneDay ' . $xpOneDay);
            array_push($resultArray, intval($xpOneDay));
        }
        return $resultArray;
    }
}
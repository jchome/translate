<?php 

namespace App\Controllers;

use App\Controllers\Generated\AjaxController;
use App\Models\UserModel;

class UserAjax extends AjaxController {


	/**
	 * Return a json message
	 */
	public function resetPassword(){

		helper(['form']);
		$formSend = $this->request->getPost('formSend');
		if($formSend == ""){
            return $this->statusFailure('No parameter');
		}

		$email = $this->request->getPost('email'); 
		$rules = [
			"email" => "required|valid_email",
		];
		if (!$this->validate($rules)) {
            return $this->statusError('invalid email');
		}

		// Find the user
		$userModel = new UserModel();
		$allUsers = $userModel->asObject()->where('email', $email)->findAll();

		if(sizeOf($allUsers) != 1){
			return $this->statusNotFound('email not found(' . sizeOf($allUsers) . ')');
		}

		$user = end($allUsers);
		$this->sendPassword($user['email'], $user['login'], $user['password']);

		return $this->statusOK($email);
	}


	private function sendPassword($to, $login, $password){
		$subject = '[Translate] Mot de passe oublié';
		$footer_message = '<p style="color: #555; font-size:8px;border-top: 1px solid #ccc;'.
				'margin-top:20px;padding-top: 10px;">'.
				'<span style="margin-left:10px;">Message envoyé automatiquement - ne pas répondre</span></p>';
		
		$message = '<html><body><p>Bonjour, <br>'.
				'Voici vos identifiants de connexion à <a href="'.base_url().'">'.base_url().'</a> : <br>'.
				'<ul><li>identifiant : '. $login . '</li>'. 
				'<li>Mot de passe : '.$password .'</li></ul>'.
				$footer_message.
				'</body></html>';
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	
		// Additional headers
		$headers .= 'To: '. $to . "\r\n".
				'From: no-reply <jc.specs@free.fr>' . "\r\n";
		return mail($to, $subject, $message, $headers);
	}
}
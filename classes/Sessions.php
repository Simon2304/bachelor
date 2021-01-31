<?php

class Sessions {

	public function setSession($form_user) {
		$userfname = $form_user['firstname'];
		$_SESSION['userfname'] = $userfname;
	}

	public function destroySession() {
		return session_destroy();
	}
}

 ?>

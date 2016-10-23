<?php

use WHMCS\View\Menu\Item as MenuItem;
if (App::getCurrentFilename() == 'clientarea' && $_SESSION['uid']) {
	add_hook('ClientAreaPrimarySidebar', 10, function(MenuItem $primarySidebar) {
		$client = getClientsDetails();
		if($client) {
			$newMenu = $primarySidebar->addChild(
				'account-info',
				array(
					'name' => 'Home',
					'label' => '账户详情',
					'order' => 10,
					'icon' => 'fa-balance-scale',
				)
			);
			$newMenu->addChild(
				'account_balance',
				array(
					'name' => 'account_balance',
					'label' => "当前余额: ".formatCurrency($client['credit']),
					'order' => 0,
					
				)
			);
		}
	});
}


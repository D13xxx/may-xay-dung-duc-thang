<?php
return [
    'id' => 'api',
	'name' => 'GIẢNG VIÊN',
    'basePath' => dirname(__DIR__),
    'components' => [
		'authManager' => [
            'class' => yii\rbac\DbManager::class,
            'itemTable' => '{{%can_bo_rbac_auth_item}}',
            'itemChildTable' => '{{%can_bo_rbac_auth_item_child}}',
            'assignmentTable' => '{{%can_bo_rbac_auth_assignment}}',
            'ruleTable' => '{{%can_bo_rbac_auth_rule}}'
        ],
        'urlManager' => require(__DIR__ . '/_urlManager.php'),
        'cache' => require(__DIR__ . '/_cache.php'),
    ],
];

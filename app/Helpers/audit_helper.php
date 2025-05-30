<?php

// app/Helpers/audit_helper.php
function log_audit($action, $details = '')
{
    $auditModel = new \App\Models\AuditTrailModel();
    $auditModel->save([
        'user_id'    => session('user_id'),
        'action'     => $action,
        'details'    => $details,
        'ip_address' => service('request')->getIPAddress(),
    ]);
}

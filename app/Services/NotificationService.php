<?php

namespace App\Services;

class NotificationService
{
    private static $createMsg = "Created Successfully";
    private static $updateMsg = "Updated Successfully";
    private static $deleteMsg = "Deleted Successfully";
    private static $errorMsg = "Something Went Wrong!";


    static function CREATED($msg = null)
    {
        notyf()->success($msg ?? self::$createMsg);
    }

    static function UPDATED($msg = null)
    {
        notyf()->success($msg ?? self::$updateMsg);
    }

    static function DELETED($msg = null)
    {
        notyf()->success($msg ?? self::$deleteMsg);
    }

    static function ERROR($msg = null)
    {
        notyf()->error($msg ?? self::$errorMsg);
    }
}

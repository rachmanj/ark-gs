<?php

namespace App\Traits;

/**
 * Flash Alert Notification
 */
trait FlashAlert
{
    public function alertCreated()
    {
        return [
            'type' => 'success',
            'message' => 'Data successfully created!'
        ];
    }

    public function alertUpdated()
    {
        return [
            'type' => 'success',
            'message' => 'Data successfully updated!'
        ];
    }

    public function alertDeleted()
    {
        return [
            'type' => 'success',
            'message' => 'Data successfully deleted!'
        ];
    }

    public function alertNotFound()
    {
        return [
            'type' => 'warning',
            'message' => 'Data not found!'
        ];
    }

    public function alertDanger()
    {
        return [
            'type' => 'danger',
            'message' => 'Something wrong!'
        ];
    }

    public function alertImport()
    {
        return [
            'type' => 'success',
            'message' => 'Data successfuly Imported!'
        ];
    }

    public function permissionDenied()
    {
        return [
            'type' => 'danger',
            'message' => 'you don’t have permission to access!'
        ];
    }

    public function alertTruncated()
    {
        return [
            'type' => 'success',
            'message' => 'Table successfuly truncated!'
        ];
    }
}

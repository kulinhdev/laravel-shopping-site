<?php

// get id colors and sizes exits
if (!function_exists('getItemExits')) {
    function getItemExits($items)
    {
        $items_exits = [];

        if ($items) {
            foreach ($items as $item) {
                $items_exits[] = $item->id;
            };
        }

        return $items_exits;
    }
}

// Alert insert success
if (!function_exists('alertInsert')) {
    function alertInsert($result, $route)
    {

        if ($result) {
            $message = 'Insert record successfully !';
            return redirect()->route($route)->with('success', $message);
        } else {
            $message = 'Insert record failed !';
            return redirect()->back()->with('error', $message);
        }
    }
}

// Alert update success
if (!function_exists('alertUpdate')) {
    function alertUpdate($result, $route)
    {
        if ($result) {
            $message = 'Update record successfully !';
            return redirect()->route($route)->with('success', $message);
        } else {
            $message = 'Update record failed !';
            return redirect()->back()->with('error', $message);
        }
    }
}

// Alert update success
if (!function_exists('alertDelete')) {
    function alertDelete($result, $route)
    {
        if ($result) {
            $message = 'Delete record successfully !';
            return redirect()->route($route)->with('success', $message);
        } else {
            $message = 'Delete record failed !';
            return redirect()->back()->with('error', $message);
        }
    }
}

// Order Status
if (!function_exists('orderStatus')) {
    function orderStatus($status)
    {
        switch ($status) {
            case 0:
                return 'Unconfirmed';
                break;

            case 1:
                return 'Processing';
                break;

            case 2:
                return 'Delivering';
                break;

            case 3:
                return 'Successful delivery';
                break;
        }
    }
}

if (!function_exists('orderStatusClass')) {
    function orderStatusClass($status)
    {
        switch ($status) {
                // Unconfirmed
            case 0:
                return 'badge-danger';
                break;
                // Processing
            case 1:
                return 'badge-secondary';
                break;
                // Delivering
            case 2:
                return 'badge-info';
                break;
                // Delivered
            case 3:
                return 'badge-success';
                break;
        }
    }
}


if (!function_exists('orderStatusClassAdmin')) {
    function orderStatusClassAdmin($status)
    {
        switch ($status) {
                // Unconfirmed
            case 0:
                return 'form-control  bg-danger';
                break;
                // Processing
            case 1:
                return 'form-control bg-secondary';
                break;
                // Delivering
            case 2:
                return 'form-control  bg-info';
                break;
                // Delivered
            case 3:
                return 'form-control  bg-success';
                break;
        }
    }
}

// Money date
if (!function_exists('moneyFormat')) {
    function moneyFormat($money)
    {
        return number_format($money, 2, ',');
    }
}

// Count total item
if (!function_exists('countTotalItem')) {
    function countTotalItem($model)
    {
        $model::all()->count();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'product_create',
            ],
            [
                'id'    => 23,
                'title' => 'product_edit',
            ],
            [
                'id'    => 24,
                'title' => 'product_show',
            ],
            [
                'id'    => 25,
                'title' => 'product_delete',
            ],
            [
                'id'    => 26,
                'title' => 'product_access',
            ],
            [
                'id'    => 27,
                'title' => 'variation_create',
            ],
            [
                'id'    => 28,
                'title' => 'variation_edit',
            ],
            [
                'id'    => 29,
                'title' => 'variation_show',
            ],
            [
                'id'    => 30,
                'title' => 'variation_delete',
            ],
            [
                'id'    => 31,
                'title' => 'variation_access',
            ],
            [
                'id'    => 32,
                'title' => 'stock_create',
            ],
            [
                'id'    => 33,
                'title' => 'stock_edit',
            ],
            [
                'id'    => 34,
                'title' => 'stock_show',
            ],
            [
                'id'    => 35,
                'title' => 'stock_delete',
            ],
            [
                'id'    => 36,
                'title' => 'stock_access',
            ],
            [
                'id'    => 37,
                'title' => 'cart_create',
            ],
            [
                'id'    => 38,
                'title' => 'cart_edit',
            ],
            [
                'id'    => 39,
                'title' => 'cart_show',
            ],
            [
                'id'    => 40,
                'title' => 'cart_delete',
            ],
            [
                'id'    => 41,
                'title' => 'cart_access',
            ],
            [
                'id'    => 42,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 43,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 44,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 45,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 46,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 47,
                'title' => 'shipping_type_create',
            ],
            [
                'id'    => 48,
                'title' => 'shipping_type_edit',
            ],
            [
                'id'    => 49,
                'title' => 'shipping_type_show',
            ],
            [
                'id'    => 50,
                'title' => 'shipping_type_delete',
            ],
            [
                'id'    => 51,
                'title' => 'shipping_type_access',
            ],
            [
                'id'    => 52,
                'title' => 'shipping_address_create',
            ],
            [
                'id'    => 53,
                'title' => 'shipping_address_edit',
            ],
            [
                'id'    => 54,
                'title' => 'shipping_address_show',
            ],
            [
                'id'    => 55,
                'title' => 'shipping_address_delete',
            ],
            [
                'id'    => 56,
                'title' => 'shipping_address_access',
            ],
            [
                'id'    => 57,
                'title' => 'order_create',
            ],
            [
                'id'    => 58,
                'title' => 'order_edit',
            ],
            [
                'id'    => 59,
                'title' => 'order_show',
            ],
            [
                'id'    => 60,
                'title' => 'order_delete',
            ],
            [
                'id'    => 61,
                'title' => 'order_access',
            ],
            [
                'id'    => 62,
                'title' => 'event_create',
            ],
            [
                'id'    => 63,
                'title' => 'event_edit',
            ],
            [
                'id'    => 64,
                'title' => 'event_show',
            ],
            [
                'id'    => 65,
                'title' => 'event_delete',
            ],
            [
                'id'    => 66,
                'title' => 'event_access',
            ],
            [
                'id'    => 67,
                'title' => 'client_list_create',
            ],
            [
                'id'    => 68,
                'title' => 'client_list_edit',
            ],
            [
                'id'    => 69,
                'title' => 'client_list_show',
            ],
            [
                'id'    => 70,
                'title' => 'client_list_delete',
            ],
            [
                'id'    => 71,
                'title' => 'client_list_access',
            ],
            [
                'id'    => 72,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

<?php


namespace App\Models;


class Permission extends \Spatie\Permission\Models\Permission
{
    static $Permission = [
        self::MANAGE_ARTICLES,
        self::MANAGE_OWN_ARTICLE,
        self::MANAGE_USERS,
        self::MANAGE_ROLE_PERMISSIONS,
        self::MANAGE_JOURNALS,
        self::MANAGE_PAGES];
    const MANAGE_ARTICLES = "manage articles";
    const MANAGE_USERS = "manage users";
    const MANAGE_ROLE_PERMISSIONS = "manage role permissions";
    const MANAGE_JOURNALS = "manage journals";
    const MANAGE_OWN_ARTICLE = "manage own article";
    const MANAGE_PAGES = "manage pages";
}

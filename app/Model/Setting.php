<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Setting
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Setting whereValue($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{

    private const ADMIN_PUBLIC_PATH = 'AdminPublicPath';
    private const ADMIN_PUBLIC_URL = 'AdminPublicUrl';
    protected $table = 'setting';
    protected $fillable = ['name', 'value'];
    private $publicPath = null;
    private $url = null;
    private static $instance = null;

    public function getAdminPublicPath()
    {
        if ($this->checkProjectIsAdmin()) {
            return public_path();
        } elseif (!$this->publicPath) {
            $this->publicPath = self::where('name', self::ADMIN_PUBLIC_PATH)->first()->value;
        }

        return $this->publicPath;
    }

    private function getAdminUrl() {
        if(!$this->url) {
            $this->url = self::where('name', self::ADMIN_PUBLIC_URL)->first()->value;
        }
        return $this->url;
    }

    public function setSettings()
    {
        if ($this->checkProjectIsAdmin()) {
            $this->updateOrCreate(['name' => self::ADMIN_PUBLIC_PATH],
                ['name' => self::ADMIN_PUBLIC_PATH, 'value' => public_path()]);
            $this->updateOrCreate(['name' => self::ADMIN_PUBLIC_URL],
                ['name' => self::ADMIN_PUBLIC_URL, 'value' => config('app.url')]);
        }
    }

    private function checkProjectIsAdmin()
    {
        return config('app.name') == 'Emlak Konut Admin';
    }

    public static function PublicPath($pathSection) {
        if(!self::$instance){
            self::$instance = new self();
        }

        $pathSection = ltrim($pathSection, '/');

        return self::$instance->getAdminPublicPath() . '/' . $pathSection;

    }

    public static function AdminUrl($url) {
        if(!self::$instance){
            self::$instance = new self();
        }

        if(self::$instance->checkProjectIsAdmin()) {
            return \URL::to($url);
        }

        $urlSection = ltrim($url, '/');

        return self::$instance->getAdminUrl() . $urlSection;
    }

}

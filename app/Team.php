<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * @var string
     */
    protected $table = 'teams';


    /**
     * @var array
     */
    protected  $fillable = ['name', 'size'];


    /**
     * @param $user
     * @throws \Exception
     */
    public function add($user)
    {

        $this->guardAgainsTooManyMembers();

        $method = $user instanceof User ? 'save' : 'saveMany';

        $this->members()->$method($user);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members()
    {

        return $this->hasMany(User::class);

    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->members()->count();
    }

    /**
     * @throws \Exception
     */
    protected function guardAgainsTooManyMembers()
    {
        if ($this->count() >= $this->size)
        {
            throw new \Exception;
        }
    }
}

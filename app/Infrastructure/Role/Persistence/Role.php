<?php

declare(strict_types=1);

namespace App\Infrastructure\Role\Persistence;

use App\Role\Domain\Model\RoleBlueprintInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Role extends Model implements RoleBlueprintInterface
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}

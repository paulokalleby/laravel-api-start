<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{    
    protected $entity;

    public function __construct(User $model)
    {
        $this->entity = $model;
    }

    public function getAll(array $filters = [])
    {
        $query =  $this->entity->when($filters, function ( Builder $query ) use ( $filters ) {

            if ( isset($filters['name']) )   $query->where('name', 'LIKE', "%{$filters['name']}%");

            if ( isset($filters['email']) )  $query->where('email', 'LIKE', "%{$filters['email']}%");

            if ( isset($filters['admin']) )  $query->whereAdmin($filters['admin']); 

            if ( isset($filters['active']) ) $query->whereActive($filters['active']); 
                
        });

        if ( 
            isset( $filters['paginate'] ) && 
            is_numeric( $filters['paginate'] ) 
        )  
            return $query->paginate( $filters['paginate'] );
        else 
            return $query->get();
    }

    public function getById(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(array $data, string $id)
    {
        $entity = $this->entity->findOrFail($id);

        $entity->update($data);

        return response()->json([
            'message' => 'success'
        ], 204);
    }

    public function delete(string $id)
    {
        $entity = $this->entity->findOrFail($id);
        
        $entity->delete();

        return response()->json([
            'message' => 'success'
        ]);
    }
}

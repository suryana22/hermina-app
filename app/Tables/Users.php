<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\AllowedFilter;
use Mockery\Generator\StringManipulation\Pass\ClassNamePass;

class Users extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('username', 'LIKE', "%{$value}%")
                        ->orWhere('firstname', 'LIKE', "%{$value}%")
                        ->orWhere('lastname', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            });
        });
        return QueryBuilder::for(User::whereDoesntHave('roles', function($q){
            $q->where('name', 'admin');
        }))
            ->defaultSort('id')
            ->allowedSorts(['id','username','firstname','lastname', 'email','birthdate'])
            ->allowedFilters(['username', 'firstname','lastname', 'email', $globalSearch]);
    // 
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id','username','firstname','lastname', 'email'])
            ->column('id', sortable: true, hidden:true)
            ->column('username', sortable: true)
            ->column('firstname', sortable: true)
            ->column('lastname', sortable: true)
            ->column('email', sortable: true)
            ->column('birthdate', sortable: true , hidden:true)
            // ->rowLink(function(User $user){
            //     return route('admin.users.edit', $user);
            // })
            ->column('actions')
            ->paginate(15)
            ->export(
                filename: 'UserTable.xlsx',
            )
            ->export(
                label: 'CSV export',
                filename: 'UserTable.csv',
                type: Excel::CSV
            );

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}

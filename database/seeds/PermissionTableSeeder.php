<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $permission = [
        	[
        		'name' => 'proposal-list',
        		'display_name' => 'Display Proposal Listing',
        		'description' => 'See only Listing Of Proposals'
        	],
        	[
        		'name' => 'proposal-create',
        		'display_name' => 'Create Proposal',
        		'description' => 'Create New Proposal'
        	],
        	[
        		'name' => 'proposal-edit',
        		'display_name' => 'Edit Proposal',
        		'description' => 'Edit Own Proposal'
        	],
        	[
        		'name' => 'proposal-delete',
        		'display_name' => 'Delete Proposal',
        		'description' => 'Delete Own Proposal'
        	],
        	[
        		'name' => 'freelancer-list',
        		'display_name' => 'Display freelancer Listing',
        		'description' => 'See only Listing Of freelancers'
        	],
        	[
        		'name' => 'client-comment-list',
        		'display_name' => 'List Client Comments',
        		'description' => 'See only Listing of Client comments'
        	],
        	[
        		'name' => 'client-comment-edit',
        		'display_name' => 'Edit Client Comments',
        		'description' => 'Edit Client Comments'
        	],
        	[
        		'name' => 'client-comment-delete',
        		'display_name' => 'Delete Client Comments',
        		'description' => 'Delete Client Comments'
        	],

        	[
        		'name' => 'freelancer-comment-list',
        		'display_name' => 'List Freelancer Comments',
        		'description' => 'See only Freelancer comment listing'
        	],
        	[
        		'name' => 'freelancer-comment-edit',
        		'display_name' => 'Edit Freelancer Comments',
        		'description' => 'Edit Freelancer Comments'
        	],

        	[
        		'name' => 'freelancer-comment-delete',
        		'display_name' => 'Delete Freelancer Comments',
        		'description' => 'Delete Freelancer Comments'
        	]
        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}

<?php

return [
    'userManagement'          => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'              => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'                    => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'                    => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
             'facility'                 => 'Facility',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'clientManagementSetting' => [
        'title'          => 'Settings',
        'title_singular' => 'Settings',
    ],
    'currency'                => [
        'title'          => 'Currencies',
        'title_singular' => 'Currency',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'name'                 => 'Name',
            'name_helper'          => '',
            'code'                 => 'Currency code',
            'code_helper'          => '',
            'main_currency'        => 'Main currency',
            'main_currency_helper' => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => '',
        ],
    ],
    'transactionType'         => [
        'title'          => 'Transaction types',
        'title_singular' => 'Transaction type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'incomeSource'            => [
        'title'          => 'Income sources',
        'title_singular' => 'Income source',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'fee_percent'        => 'Fee Percent',
            'fee_percent_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => '',
        ],
    ],
    'clientStatus'            => [
        'title'          => 'Client statuses',
        'title_singular' => 'Client status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'projectStatus'           => [
        'title'          => 'Project statuses',
        'title_singular' => 'Project status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'clientManagement'        => [
        'title'          => 'Client management',
        'title_singular' => 'Client management',
    ],
    'client'                  => [
        'title'          => 'Clients',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'first_name'        => 'First name',
            'first_name_helper' => '',
            'last_name'         => 'Last name',
            'last_name_helper'  => '',
            'company'           => 'Company',
            'company_helper'    => '',
            'email'             => 'Email',
            'email_helper'      => '',
            'phone'             => 'Phone',
            'phone_helper'      => '',
            'website'           => 'Website',
            'website_helper'    => '',
            'skype'             => 'Skype',
            'skype_helper'      => '',
            'country'           => 'Country',
            'country_helper'    => '',
            'status'            => 'Client Status',
            'status_helper'     => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'project'                 => [
        'title'          => 'Projects',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'client'             => 'Client',
            'client_helper'      => '',
            'description'        => 'Description',
            'description_helper' => '',
            'start_date'         => 'Start Date',
            'start_date_helper'  => '',
            'budget'             => 'Budget',
            'budget_helper'      => '',
            'status'             => 'Project Status',
            'status_helper'      => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated At',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted At',
            'deleted_at_helper'  => '',
        ],
    ],
    'note'                    => [
        'title'          => 'Notes',
        'title_singular' => 'Note',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'project'           => 'Project',
            'project_helper'    => '',
            'note_text'         => 'Note Text',
            'note_text_helper'  => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
        ],
    ],
    'document'                => [
        'title'          => 'Documents',
        'title_singular' => 'Document',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => '',
            'project'              => 'Project',
            'project_helper'       => '',
            'document_file'        => 'File',
            'document_file_helper' => '',
            'name'                 => 'Document Name',
            'name_helper'          => '',
            'description'          => 'Description',
            'description_helper'   => '',
            'created_at'           => 'Created at',
            'created_at_helper'    => '',
            'updated_at'           => 'Updated At',
            'updated_at_helper'    => '',
            'deleted_at'           => 'Deleted At',
            'deleted_at_helper'    => '',
        ],
    ],
    'transaction'             => [
        'title'          => 'Transactions',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'project'                 => 'Project',
            'project_helper'          => '',
            'transaction_type'        => 'Transaction Type',
            'transaction_type_helper' => '',
            'income_source'           => 'Income Source',
            'income_source_helper'    => '',
            'amount'                  => 'Amount',
            'amount_helper'           => '',
            'currency'                => 'Currency',
            'currency_helper'         => '',
            'transaction_date'        => 'Transaction Date',
            'transaction_date_helper' => '',
            'name'                    => 'Name',
            'name_helper'             => '',
            'description'             => 'Description',
            'description_helper'      => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated At',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted At',
            'deleted_at_helper'       => '',
        ],
    ],
    'clientReport'            => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
        'reports'        => [
            'month'       => 'Month',
            'income'      => 'Income',
            'expenses'    => 'Expenses',
            'fees'        => 'Fees',
            'total'       => 'Total',
            'allProjects' => 'All projects',
        ],
    ],

    'mother'         => [
        'title'          => 'Mothers',
        'title_singular' => 'Mother',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'name'                  => 'Name',
            'name_helper'           => '',
            'age'                   => 'Mothers Age',
            'age_helper'            => '',
            'marital_status'        => 'Marital Status',
            'marital_status_helper' => '',
            'village'               => 'Village',
            'village_helper'        => 'Village',
            'parish'                => 'Parish',
            'parish_helper'         => '',
            'subcounty'             => 'Subcounty',
            'subcounty_helper'      => '',
            'phone'                 => 'Phone Contact',
            'phone_helper'          => '',
            'anc_no'                => 'Anc Number',
            'anc_no_helper'         => '',
            'hiv_status'            => 'Hiv Status',
            'hiv_status_helper'     => '',
            'newly_tested'          => 'Newly Tested for HIV(yes/no)',
            'newly_tested_helper'   => '',
            'newly_art'             => 'Newly initiated in  Art(yes/no)',
            'newly_art_helper'      => '',
            'edd'                   => 'Estimated Date of delivery',
            'edd_helper'            => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
            'notes'                 => 'Notes',
            'notes_helper'          => '',
        ],
    ],
    'infant'         => [
        'title'          => 'Infants',
        'title_singular' => 'Infant',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'name'                => 'Name',
            'name_helper'         => '',
            'mother'              => 'Infant Mother',
            'mother_helper'       => '',
            'age'                 => 'Age(day)',
            'age_helper'          => '',
            'eid_no'              => 'EID Number',
            'eid_no_helper'       => '',
            'dob'                 => 'Date of birth',
            'dob_helper'          => '',
            'gender'              => 'Gender',
            'gender_helper'       => '',
            'pcr_exp_date'        => 'Expected date of 1 PCR',
            'pcr_exp_date_helper' => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
        ],
    ],
    'facility'       => [
        'title'          => 'Facilities',
        'title_singular' => 'Facility',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'email'             => 'Email',
            'email_helper'      => '',
            'contact'           => 'Contact',
            'contact_helper'    => '',
            'incharge'          => 'incharge',
            'incharge_helper'   => '',
            'village'           => 'Village',
            'village_helper'    => '',
            'subcounty'         => 'Subcounty',
            'subcounty_helper'  => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'healthWorker'   => [
        'title'          => 'Health Workers',
        'title_singular' => 'Health Worker',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'phone'             => 'Phone',
            'phone_helper'      => '',
            'email'             => 'email',
            'email_helper'      => '',
            'facility'          => 'Health Facility',
            'facility_helper'   => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'team'           => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'name'              => 'Name',
            'name_helper'       => '',
        ],
    ],
    'auditLog'       => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => '',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => '',
            'user_id'             => 'User ID',
            'user_id_helper'      => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],
        'visitType'       => [
            'title'          => 'Visit Types',
            'title_singular' => 'Visit Type',
            'fields'         => [
                'id'                  => 'ID',
                'name'           => 'Name',
                'days'         => 'Days',

            ],
    ],
    'subcounty'       => [
        'title'          => 'subcounties',
        'title_singular' => 'subcounty',
        'fields'         => [
            'id'                  => 'ID',
            'name'           => 'Subcounty Name',
            'county'         => 'County',



        ],
    ],
    'appointment'       => [
        'title'          => 'Appointments',
        'title_singular' => 'Appointment',
        'fields'         => [
            'id'                  => 'ID',
            'date'           => 'Appointment Date',
            'type'         => 'Visit Type',
            'mother'         => 'Mother',
            'actual'         => 'Attendance date',
            'notes'         => 'Notes',


        ],
],




];

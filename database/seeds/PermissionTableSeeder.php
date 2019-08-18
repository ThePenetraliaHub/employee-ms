<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Permission::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        //Administrator Users Permissions
        Permission::create(['name' => 'browse_admin_user', 'guard_name' => 'web', 'display_name' => 'Browse Administrator Users', 'table_name'=> 'administrator', 'user_type' => 'all']);
        Permission::create(['name' => 'add_admin_user', 'guard_name' => 'web', 'display_name' => 'Add Administrator Users', 'table_name'=> 'administrator', 'user_type' => 'all']);
        Permission::create(['name' => 'read_admin_user', 'guard_name' => 'web', 'display_name' => 'Read Administrator Users', 'table_name'=> 'administrator', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_admin_user', 'guard_name' => 'web', 'display_name' => 'Edit Administrator Users', 'table_name'=> 'administrator', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_admin_user', 'guard_name' => 'web', 'display_name' => 'Delete Administrator Users', 'table_name'=> 'administrator', 'user_type' => 'all']);
        Permission::create(['name' => 'activate_deactivate_admin_user', 'guard_name' => 'web', 'display_name' => 'Activate/Deactivate Administrator Users', 'table_name'=> 'administrator', 'user_type' => 'all']);


        //Employee Users Permissions
        Permission::create(['name' => 'browse_employee_user', 'guard_name' => 'web', 'display_name' => 'Browse Employee Users', 'table_name'=> 'employee_users', 'user_type' => 'all']);
        Permission::create(['name' => 'add_employee_user', 'guard_name' => 'web', 'display_name' => 'Add Employee Users', 'table_name'=> 'employee_users', 'user_type' => 'all']);
        Permission::create(['name' => 'read_employee_user', 'guard_name' => 'web', 'display_name' => 'Read Employee Users', 'table_name'=> 'employee_users', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_employee_user', 'guard_name' => 'web', 'display_name' => 'Edit Employee Users', 'table_name'=> 'employee_users', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_employee_user', 'guard_name' => 'web', 'display_name' => 'Delete Employee Users', 'table_name'=> 'employee_users', 'user_type' => 'all']);
        Permission::create(['name' => 'activate_deactivate_employee_user', 'guard_name' => 'web', 'display_name' => 'Activate/Deactivate Employee Users', 'table_name'=> 'employee_users', 'user_type' => 'all']);

        //Department Permissions
        Permission::create(['name' => 'browse_departments', 'guard_name' => 'web', 'display_name' => 'Browse Departments', 'table_name'=> 'departments', 'user_type' => 'all']);
        Permission::create(['name' => 'add_departments', 'guard_name' => 'web', 'display_name' => 'Add Departments', 'table_name'=> 'departments', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_departments', 'guard_name' => 'web', 'display_name' => 'Edit Departments', 'table_name'=> 'departments', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_departments', 'guard_name' => 'web', 'display_name' => 'Delete Departments', 'table_name'=> 'departments', 'user_type' => 'all']);

        //Clients Permissions
        Permission::create(['name' => 'browse_clients', 'guard_name' => 'web', 'display_name' => 'Browse Clients', 'table_name'=> 'clients', 'user_type' => 'all']);
        Permission::create(['name' => 'add_clients', 'guard_name' => 'web', 'display_name' => 'Add Clients', 'table_name'=> 'clients', 'user_type' => 'all']);
        Permission::create(['name' => 'read_clients', 'guard_name' => 'web', 'display_name' => 'Read Clients', 'table_name'=> 'clients', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_clients', 'guard_name' => 'web', 'display_name' => 'Edit Clients', 'table_name'=> 'clients', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_clients', 'guard_name' => 'web', 'display_name' => 'Delete Clients', 'table_name'=> 'clients', 'user_type' => 'all']);

        //Job Titles Permissions
        Permission::create(['name' => 'browse_job_titles', 'guard_name' => 'web', 'display_name' => 'Browse Job Titles', 'table_name'=> 'job_titles', 'user_type' => 'all']);
        Permission::create(['name' => 'add_job_titles', 'guard_name' => 'web', 'display_name' => 'Add Job Titles', 'table_name'=> 'job_titles', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_job_titles', 'guard_name' => 'web', 'display_name' => 'Edit Job Titles', 'table_name'=> 'job_titles', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_job_titles', 'guard_name' => 'web', 'display_name' => 'Delete Job Titles', 'table_name'=> 'job_titles', 'user_type' => 'all']);

        //Pay Grade Permissions
        Permission::create(['name' => 'browse_pay_grades', 'guard_name' => 'web', 'display_name' => 'Browse Pay Grades', 'table_name'=> 'pay_grades', 'user_type' => 'all']);
        Permission::create(['name' => 'add_pay_grades', 'guard_name' => 'web', 'display_name' => 'Add Pay Grades', 'table_name'=> 'pay_grades', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_pay_grades', 'guard_name' => 'web', 'display_name' => 'Edit Pay Grades', 'table_name'=> 'pay_grades', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_pay_grades', 'guard_name' => 'web', 'display_name' => 'Delete Pay Grades', 'table_name'=> 'pay_grades', 'user_type' => 'all']);

        //Employee Statuses Permissions
        Permission::create(['name' => 'browse_employee_statuses', 'guard_name' => 'web', 'display_name' => 'Browse Employee Statuses', 'table_name'=> 'employee_statuses', 'user_type' => 'all']);
        Permission::create(['name' => 'add_employee_statuses', 'guard_name' => 'web', 'display_name' => 'Add Employee Statuses', 'table_name'=> 'employee_statuses', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_employee_statuses', 'guard_name' => 'web', 'display_name' => 'Edit Employee Statuses', 'table_name'=> 'employee_statuses', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_employee_statuses', 'guard_name' => 'web', 'display_name' => 'Delete Employee Statuses', 'table_name'=> 'employee_statuses', 'user_type' => 'all']);

        //Employee Permissions
        Permission::create(['name' => 'browse_employee', 'guard_name' => 'web', 'display_name' => 'Browse Employee', 'table_name'=> 'employee', 'user_type' => 'all']);
        Permission::create(['name' => 'add_employee', 'guard_name' => 'web', 'display_name' => 'Add Employee', 'table_name'=> 'employee', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_employee', 'guard_name' => 'web', 'display_name' => 'Edit Employee', 'table_name'=> 'employee', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_employee', 'guard_name' => 'web', 'display_name' => 'Delete Employee', 'table_name'=> 'employee', 'user_type' => 'all']);

        //Employee Skills Permissions
        Permission::create(['name' => 'browse_employee_skills', 'guard_name' => 'web', 'display_name' => 'Browse Employee Skills', 'table_name'=> 'employee_skills', 'user_type' => 'all']);
        Permission::create(['name' => 'add_employee_skills', 'guard_name' => 'web', 'display_name' => 'Add Employee Skills', 'table_name'=> 'employee_skills', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_employee_skills', 'guard_name' => 'web', 'display_name' => 'Edit Employee Skills', 'table_name'=> 'employee_skills', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_employee_skills', 'guard_name' => 'web', 'display_name' => 'Delete Employee Skills', 'table_name'=> 'employee_skills', 'user_type' => 'all']);

        //Employee Education Permissions
        Permission::create(['name' => 'browse_employee_educations', 'guard_name' => 'web', 'display_name' => 'Browse Employee Educations', 'table_name'=> 'employee_educations', 'user_type' => 'all']);
        Permission::create(['name' => 'add_employee_educations', 'guard_name' => 'web', 'display_name' => 'Add Employee Educations', 'table_name'=> 'employee_educations', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_employee_educations', 'guard_name' => 'web', 'display_name' => 'Edit Employee Educations', 'table_name'=> 'employee_educations', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_employee_educations', 'guard_name' => 'web', 'display_name' => 'Delete Employee Educations', 'table_name'=> 'employee_educations', 'user_type' => 'all']);
        Permission::create(['name' => 'download_employee_educations', 'guard_name' => 'web', 'display_name' => 'Download Employee Educations', 'table_name'=> 'employee_educations', 'user_type' => 'all']);

        //Employee Certifications Permissions
        Permission::create(['name' => 'browse_employee_certifications', 'guard_name' => 'web', 'display_name' => 'Browse Employee Certifications', 'table_name'=> 'employee_certifications', 'user_type' => 'all']);
        Permission::create(['name' => 'add_employee_certifications', 'guard_name' => 'web', 'display_name' => 'Add Employee Certifications', 'table_name'=> 'employee_certifications', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_employee_certifications', 'guard_name' => 'web', 'display_name' => 'Edit Employee Certifications', 'table_name'=> 'employee_certifications', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_employee_certifications', 'guard_name' => 'web', 'display_name' => 'Delete Employee Certifications', 'table_name'=> 'employee_certifications', 'user_type' => 'all']);
        Permission::create(['name' => 'download_employee_certifications', 'guard_name' => 'web', 'display_name' => 'Download Employee Certifications', 'table_name'=> 'employee_certifications', 'user_type' => 'all']);

        //Projects Permissions
        Permission::create(['name' => 'browse_projects', 'guard_name' => 'web', 'display_name' => 'Browse Projects', 'table_name'=> 'projects', 'user_type' => 'all']);
        Permission::create(['name' => 'read_projects', 'guard_name' => 'web', 'display_name' => 'Read Projects', 'table_name'=> 'projects', 'user_type' => 'all']);
        Permission::create(['name' => 'add_projects', 'guard_name' => 'web', 'display_name' => 'Add Projects', 'table_name'=> 'projects', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_projects', 'guard_name' => 'web', 'display_name' => 'Edit Projects', 'table_name'=> 'projects', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_projects', 'guard_name' => 'web', 'display_name' => 'Delete Projects', 'table_name'=> 'projects', 'user_type' => 'all']);

        //Employee Tasks Permissions
        Permission::create(['name' => 'browse_employee_tasks', 'guard_name' => 'web', 'display_name' => 'Browse Employee Tasks', 'table_name'=> 'employee_tasks', 'user_type' => 'all']);
        Permission::create(['name' => 'read_employee_tasks', 'guard_name' => 'web', 'display_name' => 'Read Employee Tasks', 'table_name'=> 'employee_tasks', 'user_type' => 'employee']);
        Permission::create(['name' => 'add_employee_tasks', 'guard_name' => 'web', 'display_name' => 'Add Employee Tasks', 'table_name'=> 'employee_tasks', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_employee_tasks', 'guard_name' => 'web', 'display_name' => 'Edit Employee Tasks', 'table_name'=> 'employee_tasks', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_employee_tasks', 'guard_name' => 'web', 'display_name' => 'Delete Employee Tasks', 'table_name'=> 'employee_tasks', 'user_type' => 'all']);
        Permission::create(['name' => 'download_employee_tasks', 'guard_name' => 'web', 'display_name' => 'Download Employee Tasks', 'table_name'=> 'employee_tasks', 'user_type' => 'all']);

        //Employee Roles Permissions
        Permission::create(['name' => 'browse_employee_roles', 'guard_name' => 'web', 'display_name' => 'Browse Employee Roles', 'table_name'=> 'employee_roles', 'user_type' => 'all']);
        Permission::create(['name' => 'add_employee_roles', 'guard_name' => 'web', 'display_name' => 'Add Employee Roles', 'table_name'=> 'employee_roles', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_employee_roles', 'guard_name' => 'web', 'display_name' => 'Edit Employee Roles', 'table_name'=> 'employee_roles', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_employee_roles', 'guard_name' => 'web', 'display_name' => 'Delete Employee Roles', 'table_name'=> 'employee_roles', 'user_type' => 'all']);
        Permission::create(['name' => 'download_employee_roles', 'guard_name' => 'web', 'display_name' => 'Download Employee Roles', 'table_name'=> 'employee_roles', 'user_type' => 'all']);

        //Administrator Roles Permissions
        Permission::create(['name' => 'browse_administrator_roles', 'guard_name' => 'web', 'display_name' => 'Browse Administrator Roles', 'table_name'=> 'administrator_roles', 'user_type' => 'all']);
        Permission::create(['name' => 'add_administrator_roles', 'guard_name' => 'web', 'display_name' => 'Add Administrator Roles', 'table_name'=> 'administrator_roles', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_administrator_roles', 'guard_name' => 'web', 'display_name' => 'Edit Administrator Roles', 'table_name'=> 'administrator_roles', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_administrator_roles', 'guard_name' => 'web', 'display_name' => 'Delete Administrator Roles', 'table_name'=> 'administrator_roles', 'user_type' => 'all']);
        Permission::create(['name' => 'download_administrator_roles', 'guard_name' => 'web', 'display_name' => 'Download Administrator Roles', 'table_name'=> 'administrator_roles', 'user_type' => 'all']);

        //Employee Attendance Permissions
        Permission::create(['name' => 'browse_working_days', 'guard_name' => 'web', 'display_name' => 'Browse Working Days', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'read_working_days', 'guard_name' => 'web', 'display_name' => 'Read Working Days', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'add_working_days', 'guard_name' => 'web', 'display_name' => 'Add Working Days', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_working_days', 'guard_name' => 'web', 'display_name' => 'Edit Working Days', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_working_days', 'guard_name' => 'web', 'display_name' => 'Delete Working Days', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'download_working_days', 'guard_name' => 'web', 'display_name' => 'Download Working Days', 'table_name'=> 'attendance', 'user_type' => 'all']);

        Permission::create(['name' => 'browse_employee_attendance', 'guard_name' => 'web', 'display_name' => 'Browse Employee Attendance', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'sign_in_employee', 'guard_name' => 'web', 'display_name' => 'Sign In Employee', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'sign_out_employee', 'guard_name' => 'web', 'display_name' => 'Sign Out Employee', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'browse_attendance_general_report', 'guard_name' => 'web', 'display_name' => 'Browse Attendance General Report', 'table_name'=> 'attendance', 'user_type' => 'all']);
        Permission::create(['name' => 'browse_self_attendance', 'guard_name' => 'web', 'display_name' => 'Browse Self Attendance', 'table_name'=> 'attendance', 'user_type' => 'employee']);

        //Employee Leave Permissions
        Permission::create(['name' => 'browse_leave_profiles', 'guard_name' => 'web', 'display_name' => 'Browse Leave Profiles', 'table_name'=> 'leave', 'user_type' => 'all']);
        Permission::create(['name' => 'read_leave', 'guard_name' => 'web', 'display_name' => 'Read Leave Profiles', 'table_name'=> 'leave', 'user_type' => 'all']);
        Permission::create(['name' => 'add_leave', 'guard_name' => 'web', 'display_name' => 'Add Leave Profiles', 'table_name'=> 'leave', 'user_type' => 'all']);
        Permission::create(['name' => 'edit_leave', 'guard_name' => 'web', 'display_name' => 'Edit Leave Profiles', 'table_name'=> 'leave', 'user_type' => 'all']);
        Permission::create(['name' => 'delete_leave', 'guard_name' => 'web', 'display_name' => 'Delete Leave Profiles', 'table_name'=> 'leave', 'user_type' => 'all']);

        Permission::create(['name' => 'request_leave', 'guard_name' => 'web', 'display_name' => 'Request Leaves', 'table_name'=> 'leave', 'user_type' => 'employee']);
        Permission::create(['name' => 'approve_unapprove_leave', 'guard_name' => 'web', 'display_name' => 'Approve/Unapprove Leaves', 'table_name'=> 'leave', 'user_type' => 'all']);

        //Messages Roles
        Permission::create(['name' => 'send_messages', 'guard_name' => 'web', 'display_name' => 'Send Messages', 'table_name'=> 'messages', 'user_type' => 'all']);
        Permission::create(['name' => 'receive_messages', 'guard_name' => 'web', 'display_name' => 'Receive Messages', 'table_name'=> 'messages', 'user_type' => 'all']);
    }
}

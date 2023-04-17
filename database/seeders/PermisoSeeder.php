<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);

        $permission = Permission::create(['name' => 'persona.index', 'descripcion' => 'Persona: Index'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'persona.edit', 'descripcion' => 'Persona: Editar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'persona.update', 'descripcion' => 'Persona: Actualizar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'persona.create', 'descripcion' => 'Persona: Crear'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'persona.store', 'descripcion' => 'Persona: Guardar'])->syncRoles($admin);

        $permission = Permission::create(['name' => 'paciente.index', 'descripcion' => 'Paciente: Index'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'paciente.edit', 'descripcion' => 'Paciente: Editar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'paciente.update', 'descripcion' => 'Paciente: Actualizar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'paciente.create', 'descripcion' => 'Paciente: Crear'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'paciente.store', 'descripcion' => 'Paciente: Guardar'])->syncRoles($admin);

        $permission = Permission::create(['name' => 'doctor.index', 'descripcion' => 'Doctor: Index'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor.edit', 'descripcion' => 'Doctor: Editar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor.update', 'descripcion' => 'Doctor: Actualizar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor.create', 'descripcion' => 'Doctor: Crear'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor.store', 'descripcion' => 'Doctor: Guardar'])->syncRoles($admin);

        $permission = Permission::create(['name' => 'especialidad.index', 'descripcion' => 'Especialidad: Index'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'especialidad.edit', 'descripcion' => 'Especialidad: Editar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'especialidad.update', 'descripcion' => 'Especialidad: Actualizar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'especialidad.create', 'descripcion' => 'Especialidad: Crear'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'especialidad.store', 'descripcion' => 'Especialidad: Guardar'])->syncRoles($admin);

        $permission = Permission::create(['name' => 'user.index', 'descripcion' => 'User: Index'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'user.edit', 'descripcion' => 'User: Editar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'user.update', 'descripcion' => 'User: Actualizar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'user.create', 'descripcion' => 'User: Crear'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'user.store', 'descripcion' => 'User: Guardar'])->syncRoles($admin);

        $permission = Permission::create(['name' => 'role.index', 'descripcion' => 'Roles: Index'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'role.edit', 'descripcion' => 'Roles: Editar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'role.update', 'descripcion' => 'Roles: Actualizar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'role.create', 'descripcion' => 'Roles: Crear'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'role.store', 'descripcion' => 'Roles: Guardar'])->syncRoles($admin);

        $permission = Permission::create(['name' => 'doctor.asignar_especialidad', 'descripcion' => 'Doctor: Asignar Especialidad'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor.asignar_especialidad_store', 'descripcion' => 'Doctor: Guardar Especialidad'])->syncRoles($admin);


        $permission = Permission::create(['name' => 'agenda_consulta.index', 'descripcion' => 'Agenda Consulta: Index'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'agenda_consulta.especialidad', 'descripcion' => 'Agenda Consulta: Especialidad'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'agenda_consulta.especialidad_store', 'descripcion' => 'Agenda Consulta: Especialidad Guardar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'agenda_consulta.agendado', 'descripcion' => 'Agenda Consulta: Agendado'])->syncRoles($admin);

        $permission = Permission::create(['name' => 'doctor_consulta.index', 'descripcion' => 'Perfil Doctor: Index'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor_consulta.atender', 'descripcion' => 'Perfil Doctor: Atender'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor_consulta.editar_estado', 'descripcion' => 'Perfil Doctor: Editar Estado'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor_consulta.store', 'descripcion' => 'Perfil Doctor: Guardar'])->syncRoles($admin);
        $permission = Permission::create(['name' => 'doctor_consulta.atendido', 'descripcion' => 'Perfil Doctor: Atendido'])->syncRoles($admin);

        $permission = Permission::create(['name' => 'consulta.index', 'descripcion' => 'Consulta General'])->syncRoles($admin);

    }
}

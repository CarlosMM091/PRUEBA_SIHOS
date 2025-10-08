<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function index()
    {
        $pacientes = Paciente::with(['tipoDocumento', 'genero', 'departamento', 'municipio'])->get();
        return response()->json($pacientes);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_documento_id' => 'required|exists:tipos_documento,id',
            'numero_documento' => 'required|unique:paciente,numero_documento',
            'nombre1' => 'required|string|max:50',
            'apellido1' => 'required|string|max:50',
            'genero_id' => 'required|exists:genero,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'municipio_id' => 'required|exists:municipios,id',
            'correo' => 'nullable|email'
        ]);

        $paciente = Paciente::create($validated);
        return response()->json(['message' => 'Paciente creado correctamente', 'paciente' => $paciente]);
    }


    public function show($id)
    {
        $paciente = Paciente::with(['tipoDocumento', 'genero', 'departamento', 'municipio'])->findOrFail($id);
        return response()->json($paciente);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);

        $validated = $request->validate([
            'tipo_documento_id' => 'sometimes|exists:tipos_documento,id',
            'numero_documento' => 'sometimes|unique:paciente,numero_documento,' . $id,
            'nombre1' => 'sometimes|string|max:50',
            'apellido1' => 'sometimes|string|max:50',
            'genero_id' => 'sometimes|exists:genero,id',
            'departamento_id' => 'sometimes|exists:departamentos,id',
            'municipio_id' => 'sometimes|exists:municipios,id',
            'correo' => 'nullable|email'
        ]);

        $paciente->update($validated);
        return response()->json(['message' => 'Paciente actualizado correctamente', 'paciente' => $paciente]);
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
        return response()->json(['message' => 'Paciente eliminado correctamente']);
    }
}

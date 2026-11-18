<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi Calculadora</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e8eef5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .calculadora {
            background: white;
            width: 350px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px #0002;
        }

        h1 {
            text-align: center;
            color: #2563eb;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 7px;
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 20px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #1d4ed8;
        }

        .resultado {
            background: #dcfce7;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            text-align: center;
            color: #166534;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 8px;
        }
    </style>
</head>

<body>

    <div class="calculadora">

        <h1>Mi Calculadora</h1>

        <form action="{{ route('calculadora.calcular') }}" method="POST">

            @csrf

            <label>Primer número:</label>

            <input
                type="number"
                step="any"
                name="numero1"
                placeholder="Escribe el primer número"
                value="{{ old('numero1', $numero1 ?? '') }}"
                required
            >

            @error('numero1')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Segundo número:</label>

            <input
                type="number"
                step="any"
                name="numero2"
                placeholder="Escribe el segundo número"
                value="{{ old('numero2', $numero2 ?? '') }}"
                required
            >

            @error('numero2')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Selecciona una operación:</label>

            <select name="operacion" required>

                <option value="suma"
                    {{ old('operacion', $operacion ?? '') == 'suma' ? 'selected' : '' }}>
                    Suma (+)
                </option>

                <option value="resta"
                    {{ old('operacion', $operacion ?? '') == 'resta' ? 'selected' : '' }}>
                    Resta (-)
                </option>

                <option value="multiplicacion"
                    {{ old('operacion', $operacion ?? '') == 'multiplicacion' ? 'selected' : '' }}>
                    Multiplicación (×)
                </option>

                <option value="division"
                    {{ old('operacion', $operacion ?? '') == 'division' ? 'selected' : '' }}>
                    División (÷)
                </option>

            </select>

            <button type="submit">
                CALCULAR
            </button>

        </form>

        @if(isset($resultado))

            <div class="resultado">
                <h3>Resultado:</h3>
                <h2>{{ $resultado }}</h2>
            </div>

        @endif

    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #0d6efd;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .content {
            padding: 30px 20px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            border-top: 1px solid #dee2e6;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Bem-vindo!</h1>
        </div>

        <div class="content">
            <h2>Olá, {{ ucfirst($user->name) }}!</h2>

            <p>Seja muito bem-vindo(a) ao <strong>{{ config('app.name', 'Dinamk Tech') }}</strong>!</p>

            <p>Sua conta foi criada com sucesso e você já pode começar a usar o sistema.</p>

            <h3>Seus dados:</h3>
            <ul>
                <li><strong>Nome:</strong> {{ $user->name }}</li>
                <li><strong>E-mail:</strong> {{ $user->email }}</li>
                <li><strong>Data de cadastro:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</li>
            </ul>

            <p>Se você tiver alguma dúvida ou precisar de ajuda, não hesite em entrar em contato conosco.</p>

            <div style="text-align: center;">
                <a href="{{ url('/login') }}" class="btn">Acessar o Sistema</a>
            </div>
        </div>

        <div class="footer">
            <p>Este é um e-mail automático, por favor não responda.</p>
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Dinamk Tech') }}</p>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Task Criada</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .logo {
            display: block;
            margin: 0 auto;
            max-width: 150px;
        }
        .task-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
        }
        .task-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Logo -->
        <img src="{{ asset('images/EXPERMED.webp') }}" alt="Logo" class="logo">
        <h1>Olá, {{ $task->user->name }}</h1>

        <p>Uma nova task foi criada para você. Confira os detalhes abaixo:</p>

        <!-- Informações da task -->
        <div class="task-info">
            <p><strong>Título:</strong> <span class="highlight">{{ $task->title }}</span></p>
            <p><strong>Descrição:</strong> {{ $task->description }}</p>
            <p><strong>Data de criação:</strong> {{ $task->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="footer">
            <p>Se você tiver alguma dúvida, entre em contato com nossa equipe.</p>
        </div>
    </div>
</body>
</html>

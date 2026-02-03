<?php
namespace App\Controllers;

class Teste2Controller extends BaseController
{
    public function teste2($name)
    {
        $data=[
            'sobreNome' => $name
        ];

        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        // echo '<hr>';
        // echo "<pre>";
        // var_dump($data);
        // echo "<pre>";
        // die;
        // return view('users/teste2', $data);
        return $data;
    }

    public function laboratorio()
    {
        $resultado = $this->teste2("cristiano victor oliveira");
        echo "<pre>";
        print_r($resultado);
        echo "<pre>";
        echo '<hr>';
        echo "<pre>";
        var_dump($resultado);
        echo "<pre>";
        die;
        exit;
    }

    public function relatorio()
{
    $logPath = "/var/www/shell/logs/scan_extesoes.log";

    if (!file_exists($logPath)) {
        return "Arquivo de log não encontrado. Execute o script seg6.sh no terminal primeiro.";
    }

    // Lê o arquivo para um array (cada linha é um item do array)
    $linhas = file($logPath);
    
    // Vamos extrair apenas as linhas de "total" para dar um destaque
    $totais = [];
    foreach ($linhas as $linha) {
        if (strpos($linha, 'total') !== false || strpos($linha, 'OUTROS arquivos') !== false) {
            $totais[] = $linha;
        }
    }

    $data = [
        'titulo'  => 'Relatório de Segurança (Shell Scan)',
        'conteudo' => $linhas,
        'totais'   => $totais
    ];

    return view('users/relatorio_view', $data);
}

public function dispararScan()
{
    // O comando que você digita no terminal, agora dentro do PHP
    // Redirecionamos o erro (2>&1) para conseguir ver se algo falhar
    $output = shell_exec('/var/www/shell/seguranca/seg6.sh 2>&1');

    // Salvamos o resultado na sessão para mostrar um alerta (opcional)
    return redirect()->to('/seguranca/relatorio')->with('mensagem', 'Scan executado com sucesso!');
}
}

?>
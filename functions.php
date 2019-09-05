<?php
function formatCnpjCpf($value) {
  $cnpj_cpf = preg_replace("/\D/", '', $value);

  if (strlen($cnpj_cpf) === 11) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  }
    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}

function turno($value) {
       if ($value=="M") return "Manhã";
  else if ($value=="T") return "Tarde";
  else return "Noite";

}

function formataData($value){
  if ($value=="0000-00-00") return "00/00/0000";
  $value = strtotime($value);
  $new_date = date("d-m-Y", $value);
  $value = str_replace('-', '/', $new_date);
  return $value;
}

function removepontocpf($cpf){
  $cpf = str_replace("-", "", $cpf);
   $cpf = str_replace(".", "", $cpf);
   return $cpf;
}

function status($vagasSerie, $vagaAluno){
  //echo "Série:".$vagasSerie;
  //echo "Aluno:".$vagaAluno;
  //echo "<br>" ;
  if ($vagasSerie==0)                            return "Sem oferta de Vagas";
  if ($vagaAluno > 0 and $vagaAluno<=$vagasSerie) return "Pré-Matriculado";
  else                                           return "Não Matriculado";
}

function statusArquivo($vagasSerie, $vagaAluno, $arquivo){
  if ($vagasSerie==0) return "";
  if ($vagaAluno<=$vagasSerie && $vagaAluno > 0) return '<a href="'.$arquivo.'">Ficha de Matrícula</a>';
  else                                           return "";
}


?>

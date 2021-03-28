    <?php
    	//die;
		$sR = array(
				$solucoes[0]['result']['valor_total_km1'],
				$solucoes[1]['result']['valor_total_km1'],
				$solucoes[2]['result']['valor_total_km1'],
				$solucoes[3]['result']['valor_total_km1'],
				$solucoes[4]['result']['valor_total_km1'],
				$solucoes[5]['result']['valor_total_km1'],
				$solucoes[6]['result']['valor_total_km1'],
				$solucoes[7]['result']['valor_total_km1'],
				$solucoes[8]['result']['valor_total_km1'],
				$solucoes[9]['result']['valor_total_km1'],
				$solucoes[10]['result']['valor_total_km1'],
				$solucoes[11]['result']['valor_total_km1'],
				$solucoes[12]['result']['valor_total_km1'],
				$solucoes[13]['result']['valor_total_km1'],
				$solucoes[14]['result']['valor_total_km1'],
				$solucoes[15]['result']['valor_total_km1'],
				$solucoes[16]['result']['valor_total_km1'],
				$solucoes[17]['result']['valor_total_km1'],
				$solucoes[18]['result']['valor_total_km1'],
				$solucoes[19]['result']['valor_total_km1']	
		);

		/*
		$sR = array($solucoes[0]['result']['valor_total_km1'],
		
		
				645580.80, 140089.54, 184938.05, 229786.56, 271884.67, 313968.38,
				358816.90, 400900.61, 442984.32, 84168.00, 117665.28, 464535.36, 548717.18,
				593565.70, 635649.41, 14250.00, 47600.00, 19300.00, 100640.00
		);
		*/
		
		$iSA = 1.3425;
		$fC = 0.7;
		$aP = 7200;
		$aA = 5000;
		$dataBase = '2015-01-01';
    ?>
    
    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Relatórios Custo Médio Gerencial
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              Modalidade
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
		<table cellspacing="0" border="0">
			<colgroup span="18" width="65"></colgroup>
			<tr>
				<td colspan=18 height="27" align="center" valign=bottom><b><font face="Arial" size=4>CATÁLOGO DE SOLUÇÕES TÉCNICAS - DNIT</font></b></td>
				</tr>
			<tr>
				<td colspan=18 height="21" align="center" valign=bottom><font face="Arial" size=3>Rodovias com revestimento em Tratamento Superficial (Soluções de reforço calculados pela PRO-11/79 10 anos)</font></td>
				</tr>
			<tr>
				<td class="class_relatorio_4"   colspan=18 height="20" align="left" valign=bottom><b><font face="Arial">Plataforma considerada: Pista com 7,20m (2x3,60) e acostamento com 5,00 (2x2,50) Mês base (SICRO 2): <?php echo $dataBase; ?> Custo por quilômetro de Rodovia com Valores em (R$)</font></b></td>
				</tr>
			<tr>
				<td class="class_relatorio_1" colspan=2 rowspan=2 height="40" align="center" valign=middle><font face="Arial" size=1>VMD, &quot;N&quot;                   IRI, IGG</font></td>
				<td class="class_relatorio_1" colspan=4 align="center" valign=bottom><font face="Arial" size=1>IRI&lt;=3 (BOM)</font></td>
				<td class="class_relatorio_1" colspan=4 align="center" valign=bottom><font face="Arial" size=1>3&lt;IRI&lt;=4 (REGULAR)</font></td>
				<td class="class_relatorio_1" colspan=4 align="center" valign=bottom><font face="Arial" size=1>4&lt;IRI&lt;=5,5 (MAU)</font></td>
				<td class="class_relatorio_1" colspan=4 align="center" valign=bottom><font face="Arial" size=1>IRI&gt;5,5 (PÉSSIMO)</font></td>
				</tr>
			<tr>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&lt;=20</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&gt;20</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&lt;=20</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&gt;20</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&lt;=60</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&gt;60</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&lt;=60</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&gt;60</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&lt;=100</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&gt;100</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&lt;=100</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&gt;100</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&lt;=150</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&gt;150</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&lt;=150</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>IGG&gt;150</font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" colspan=2 height="20" align="center" valign=bottom><font face="Arial" size=1>Deflexão Admissivel = 64</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				</tr>
			<tr>
				<td class="class_relatorio_1" height="46" align="center" valign=middle><font face="Arial" size=1>VMD</font></td>
				<td class="class_relatorio_1" rowspan=2 align="center" valign=middle><font face="Arial" size=1>PISTA</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (1%) + LG</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + LG</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (1%) + H5</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + H5</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + H5</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + H5</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + REP + H5</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + H5</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC5</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + H5</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC5</font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=middle><font face="Arial" size=1>&lt; 1000</font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $aa1 = round(($sR[1]*0.01 + $sR[0]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $aa2 = round(($sR[1]*0.03 + $sR[0]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $bb1 = round(($sR[1]*0.01 + $sR[4]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $bb2 = round(($sR[1]*0.03 + $sR[4]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cc1 = round(($sR[1]*0.03 + $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cc2 = round(($sR[1]*0.05 + $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dd1 = round(($sR[1]*0.03 + $sR[4]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dd2 = round(($sR[1]*0.05 + $sR[4]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ee1 = round(($sR[1]*0.05 + $sR[10]+ $sR[11]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ee2 = round(($sR[1]*0.1 + $sR[10]+ $sR[11]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ff1 = round(($sR[1]*0.05 + $sR[11] + $sR[4]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ff2 = round(($sR[1]*0.1 + $sR[11]+ $sR[4]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $gg1 = round(($sR[1]*0.1 + $sR[11]+ $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $hh1 = round(($sR[12] * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ii1 = round(($sR[1]*0.1 + $sR[11]+ $sR[4]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $jj1 = round(($sR[12] * $iSA), 2); ?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="45" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1>N(USACE)</font></td>
				<td class="class_relatorio_1" rowspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>ACOSTA- MENTO</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1> TSD</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(10%) + TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(20%) + TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(30%) + TSS</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>REC + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>REC + TSD</font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1>6.90E+06</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $a = round(($sR[18] * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $b = round(($sR[17] * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $c = round((($sR[16] * 0.1 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $d = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $e = round((($sR[16] * 0.2 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $f = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $g = round((($sR[16] * 0.3 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $h = round((($sR[19] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $i = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $j = round((($sR[19] + $sR[17]) * $iSA), 2); ?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" rowspan=2 height="40" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>PISTA + ACOSTAM. (F.Corr.=0,7)</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>C.Financeiro</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ar1 = round(($aa1 + $a), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ar2 = round(($aa2 + $a), 2)?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $br1 = round(($bb1 + $b), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $br2 = round(($bb2 + $b), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cr1 = round(($cc1 + $c), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cr2 = round(($cc2 + $c), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dr1 = round(($dd1 + $d), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dr2 = round(($dd2 + $d), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $er1 = round(($ee1 + $e), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $er2 = round(($ee2 + $e), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $fr1 = round(($ff1 + $f), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $fr2 = round(($ff2 + $f), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $gr1 = round(($gg1 + $g), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $hr1 = round(($hh1 + $h), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ir1 = round(($ii1 + $i), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $jr1 = round(($jj1 + $j), 2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>C.Econômico</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ar1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ar2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($br1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($br2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($cr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($cr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($dr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($dr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($er1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($er2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($fr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($fr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($gr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($hr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ir1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($jr1 * $fC), 2); ?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_2 class_relatorio_3"  height="20" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" colspan=2 height="20" align="center" valign=bottom><font face="Arial" size=1>Deflexão Admissivel = 56</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				</tr>
			<tr>
				<td class="class_relatorio_1" height="46" align="center" valign=middle><font face="Arial" size=1>VMD</font></td>
				<td class="class_relatorio_1" rowspan=2 align="center" valign=middle><font face="Arial" size=1>PISTA</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (1%) + LG</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + LG</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (1%) + H7</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + H7</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + H7</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + H7</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + REP + H6</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + H6</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC7</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + H7</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC7</font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=middle><font face="Arial" size=1>1000 &lt; 2000</font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $aa1 = round(($sR[1]*0.01 + $sR[0]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $aa2 = round(($sR[1]*0.03 + $sR[0]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $bb1 = round(($sR[1]*0.01 + $sR[6]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $bb2 = round(($sR[1]*0.03 + $sR[6]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cc1 = round(($sR[1]*0.03 + $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cc2 = round(($sR[1]*0.05 + $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dd1 = round(($sR[1]*0.03 + $sR[6]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dd2 = round(($sR[1]*0.05 + $sR[6]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ee1 = round(($sR[1]*0.05 + $sR[10]+ $sR[11]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ee2 = round(($sR[1]*0.1 + $sR[10]+ $sR[11]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ff1 = round(($sR[1]*0.05 + $sR[11] + $sR[5]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ff2 = round(($sR[1]*0.1 + $sR[11]+ $sR[5]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $gg1 = round(($sR[1]*0.1 + $sR[11]+ $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $hh1 = round(($sR[13] * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ii1 = round(($sR[1]*0.1 + $sR[11]+ $sR[6]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $jj1 = round(($sR[13] * $iSA), 2); ?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="45" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1>N(USACE)</font></td>
				<td class="class_relatorio_1" rowspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>ACOSTA- MENTO</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(10%) + TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(20%) + TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(30%) + TSS</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>REC + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>REC + TSD</font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1>6.90E+06</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $a = round(($sR[18] * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $b = round((($sR[16]+ $sR[17])* $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $c = round((($sR[16] * 0.1 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $d = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $e = round((($sR[16] * 0.2 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $f = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $g = round((($sR[16] * 0.3 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $h = round((($sR[19] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $i = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $j = round((($sR[19] + $sR[17]) * $iSA), 2); ?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" rowspan=2 height="40" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>PISTA + ACOSTAM. (F.Corr.=0,7)</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>C.Financeiro</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ar1 = round(($aa1 + $a), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ar2 = round(($aa2 + $a), 2)?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $br1 = round(($bb1 + $b), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $br2 = round(($bb2 + $b), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cr1 = round(($cc1 + $c), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cr2 = round(($cc2 + $c), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dr1 = round(($dd1 + $d), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dr2 = round(($dd2 + $d), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $er1 = round(($ee1 + $e), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $er2 = round(($ee2 + $e), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $fr1 = round(($ff1 + $f), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $fr2 = round(($ff2 + $f), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $gr1 = round(($gg1 + $g), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $hr1 = round(($hh1 + $h), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ir1 = round(($ii1 + $i), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $jr1 = round(($jj1 + $j), 2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>C.Econômico</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ar1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ar2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($br1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($br2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($cr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($cr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($dr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($dr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($er1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($er2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($fr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($fr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($gr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($hr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ir1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($jr1 * $fC), 2); ?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_2" height="20" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_4"   height="20" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" colspan=2 height="20" align="center" valign=bottom><font face="Arial" size=1>Deflexão Admissivel = 52</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &lt;= D.admissivel</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom><font face="Arial" size=1>Deflexão &gt; D.admissivel</font></td>
				</tr>
			<tr>
				<td class="class_relatorio_1" height="46" align="center" valign=middle><font face="Arial" size=1>VMD</font></td>
				<td class="class_relatorio_1" rowspan=2 align="center" valign=middle><font face="Arial" size=1>PISTA</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (1%) + LG</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + LG</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (1%) + H8</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + H8</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (3%) + H8</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + H8</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (5%) + REP + H7</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + H7</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + TSDpol</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC8</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>RP (10%) + REP + H8</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC8</font></td>
			</tr>
			<tr>
			   <td class="class_relatorio_1" height="20" align="center" valign=middle><font face="Arial" size=1>&gt;= 2000</font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $aa1 = round(($sR[1]*0.01 + $sR[0]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $aa2 = round(($sR[1]*0.03 + $sR[0]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $bb1 = round(($sR[1]*0.01 + $sR[7]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $bb2 = round(($sR[1]*0.03 + $sR[7]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cc1 = round(($sR[1]*0.03 + $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cc2 = round(($sR[1]*0.05 + $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dd1 = round(($sR[1]*0.03 + $sR[7]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dd2 = round(($sR[1]*0.05 + $sR[7]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ee1 = round(($sR[1]*0.05 + $sR[10]+ $sR[11]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ee2 = round(($sR[1]*0.1 + $sR[10]+ $sR[11]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ff1 = round(($sR[1]*0.05 + $sR[11] + $sR[6]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ff2 = round(($sR[1]*0.1 + $sR[11]+ $sR[6]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $gg1 = round(($sR[1]*0.1 + $sR[11]+ $sR[10]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $hh1 = round(($sR[14] * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ii1 = round(($sR[1]*0.1 + $sR[11]+ $sR[7]) * $iSA, 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $jj1 = round(($sR[14] * $iSA), 2); ?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="45" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1>N(USACE)</font></td>
				<td class="class_relatorio_1" rowspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>ACOSTA- MENTO</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(10%) + TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(20%) + TSS</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base(30%) + TSS</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>REC + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>Reest.de base + TSD</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"><font face="Arial" size=1>REC + TSD</font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=middle sdval="21400000" sdnum="1033;0;0.00E+00"><font face="Arial" size=1>2.14E+07</font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $a = round(($sR[18] * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $b = round((($sR[16]+ $sR[17])* $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $c = round((($sR[16] * 0.1 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $d = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $e = round((($sR[16] * 0.2 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=middle bgcolor="#DBEEF4" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $f = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $g = round((($sR[16] * 0.3 + $sR[18]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $h = round((($sR[19] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $i = round((($sR[16] + $sR[17]) * $iSA), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#DBEEF4"  sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $j = round((($sR[19] + $sR[17]) * $iSA), 2); ?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" rowspan=2 height="40" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>PISTA + ACOSTAM. (F.Corr.=0,7)</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>C.Financeiro</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ar1 = round(($aa1 + $a), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ar2 = round(($aa2 + $a), 2)?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $br1 = round(($bb1 + $b), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $br2 = round(($bb2 + $b), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cr1 = round(($cc1 + $c), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $cr2 = round(($cc2 + $c), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dr1 = round(($dd1 + $d), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $dr2 = round(($dd2 + $d), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $er1 = round(($ee1 + $e), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $er2 = round(($ee2 + $e), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $fr1 = round(($ff1 + $f), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $fr2 = round(($ff2 + $f), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $gr1 = round(($gg1 + $g), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $hr1 = round(($hh1 + $h), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ir1 = round(($ii1 + $i), 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $jr1 = round(($jj1 + $j), 2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE"><font face="Arial" size=1>C.Econômico</font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ar1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ar2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($br1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($br2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($cr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($cr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($dr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($dr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($er1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($er2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($fr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($fr2 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($gr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($hr1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($ir1 * $fC), 2); ?></font></td>
				<td class="class_relatorio_1" align="center" valign=middle bgcolor="#EBF1DE" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo round(($jr1 * $fC), 2); ?></font></td>
			</tr>
			<tr>
				<td height="20" align="center" valign=middle sdnum="1033;0;0.00E+00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="center" valign=middle sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" colspan=5 height="20" align="center" valign=bottom><b><font face="Arial" size=1>ÍNDICE (para se chegar ao valor final da solução aplicada) =</font></b></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="1.3425" sdnum="1033;"><b><font face="Arial" size=1 color="#FF0000"><?php echo $iSA; ?></font></b></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>TSDpol</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Tratamento Sup.Duplo c/ Emulsão Mod.p/polimero</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="84168" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[10], 2);?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" colspan=4 height="20" align="center" valign=bottom bgcolor="#C6D9F1"><b><font face="Arial" size=1>PISTA (plataforma: 2 faixas de 3,5m)</font></b></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#C6D9F1"><font face="Arial" size=1>ÁREA(m2) =</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom bgcolor="#C6D9F1" sdval="7200" sdnum="1033;"><font face="Arial" size=1 color="#FF0000"><?php echo $aP; ?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REP</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Reperfilamento c/CBUQ massa fina esp.2,5cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="117665.28" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[11], 2);?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" colspan=5 height="20" align="center" valign=bottom><font face="Arial" size=1>INTERVENÇÃO</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>VALOR DA</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC 5</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50%+Cim.+Revest.CBUQ 5cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="464535.36" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[12], 2);?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=middle><font face="Arial" size=1>SÍMBOLO</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=middle><font face="Arial" size=1>               DESCRIÇÃO DA SOLUÇÃO</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>SOLUÇÃO</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_1" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_1" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_1" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_1" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_1" align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>LG</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Lama asfáltica Grossa de 1,6cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="97560" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[0], 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC 7</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50%+Cim.+Revest.CBUQ 7cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="548717.184" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[13], 2);?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>RP</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Reparo Profundo</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="645580.8" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[1], 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC 8</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50%+Cim.+Revest.CBUQ 8cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="593565.696" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[14], 2);?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H3</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 3cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="140089.536" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[2], 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC 9</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50%+Cim.+Revest.CBUQ 9cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="635649.408" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[15], 2);?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H4</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 4cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="184938.048" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[3], 2);?></font></td>
				<td class="class_relatorio_6"  align="center" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H5</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 5cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="229786.56" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[4], 2);?></font></td>
				<td class="class_relatorio_1" colspan=4 align="center" valign=bottom bgcolor="#C6D9F1"><b><font face="Arial" size=1>ACOSTAMENTOS (2 lados de 2,5m)</font></b></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#C6D9F1"><font face="Arial" size=1>ÁREA(m2) =</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom bgcolor="#C6D9F1" sdval="5000" sdnum="1033;"><font face="Arial" size=1 color="#FF0000"><?php echo $aA; ?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H6</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 6cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="271884.672" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[5], 2);?></font></td>
				<td class="class_relatorio_1" colspan=5 align="center" valign=bottom><font face="Arial" size=1>INTERVENÇÃO</font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>VALOR</font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H7</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 7cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="313968.384" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[6], 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>Reest.de base</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Reestabilização d base c/adição Material 50%</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="14250" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[16], 2);?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H8</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 8cm</font></td>
				<td class="class_relatorio_7"  align="right" valign=bottom sdval="358816.896" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[7], 2);?></font></td>
				<td class="class_relatorio_7"  align="center" valign=bottom><font face="Arial" size=1>TSD</font></td>
				<td class="class_relatorio_7"  colspan=4 align="left" valign=bottom><font face="Arial" size=1>Tratamento Superficial Duplo</font></td>
				<td class="class_relatorio_7"  align="right" valign=bottom sdval="47600" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[17], 2);?></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H9</font></td>
				<td class="class_relatorio_6"  colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 9cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="400900.608" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[8], 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>TSS</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Tratamento Superficial Simples</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="19300" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[18], 2);?></font></td>
				<td class="class_relatorio_9"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="center" valign=bottom><b><font face="Arial" size=1><br></font></b></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H10</font></td>
				<td class="class_relatorio_6"  colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 10cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="442984.32" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[9], 2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50% + Cimento</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="100640" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><?php echo round($sR[19], 2);?></font></td>
				<td class="class_relatorio_9"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4 class_relatorio_5"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_1" colspan=2 align="center" valign=bottom bgcolor="#EEECE1"><b><font face="Arial" size=1>Valor Final da Solução</font></b></td>
				</tr>
			<tr>
				<td height="20" align="center" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><br></font></td>
				<td class="class_relatorio_2" align="center" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2 class_relatorio_3"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#0070C0"><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_10"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_1" rowspan=3 align="center" valign=bottom><font face="Arial" size=1>VALOR R$/m2 Financeiro</font></td>
				<td class="class_relatorio_1" rowspan=3 align="center" valign=bottom><font face="Arial" size=1>VALOR R$/m2 Econômico</font></td>
				<td class="class_relatorio_1" rowspan=3 align="center" valign=bottom bgcolor="#EEECE1"><font face="Arial" size=1>VALOR R$/m2 Financeiro</font></td>
				<td class="class_relatorio_1" rowspan=3 align="center" valign=bottom bgcolor="#EEECE1"><font face="Arial" size=1>VALOR R$/m2 Econômico</font></td>
			</tr>
			<tr>
				<td height="20" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4 class_relatorio_5"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_8"  align="left" valign=bottom bgcolor="#EEECE1"><b><font face="Arial" size=1>Valor Final da Solução</font></b></td>
				<td class="class_relatorio_8"  align="left" valign=bottom bgcolor="#EEECE1"><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_9"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_10"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				</tr>
			<tr>
				<td colspan=4 height="20" align="left" valign=bottom><b><font face="Arial" size=1>FATOR DE CORRELAÇÃO (C.Econôm.X C.Financ.) =</font></b></td>
				<td align="center" valign=bottom sdval="0.7" sdnum="1033;"><b><font face="Arial" size=1 color="#FF0000">0.7</font></b></td>
				<td class="class_relatorio_1" rowspan=3 align="center" valign=bottom><font face="Arial" size=1>VALOR R$/m2 Financeiro</font></td>
				<td class="class_relatorio_1" rowspan=3 align="center" valign=bottom><font face="Arial" size=1>VALOR R$/m2 Econômico</font></td>
				<td class="class_relatorio_1" rowspan=3 align="center" valign=bottom bgcolor="#EEECE1"><font face="Arial" size=1>VALOR R$/m2 Financeiro</font></td>
				<td class="class_relatorio_1" rowspan=3 align="center" valign=bottom bgcolor="#EEECE1"><font face="Arial" size=1>VALOR R$/m2 Econômico</font></td>
				<td class="class_relatorio_11"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4 class_relatorio_5"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				</tr>
			<tr>
				<td height="20" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="center" valign=bottom><font face="Arial" size=1 color="#FF0000"><br></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>TSDpol</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Tratamento Sup.Duplo c/ Emulsão Mod.p/polimero</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="11.69" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf10 = round(($sR[10]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="8.183" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve10 = round(($vf10 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="15.693825" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf10) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="10.9856775" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve10) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td height="20" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REP</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Reperfilamento c/CBUQ massa fina esp.2,5cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="16.3424" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo  $vf11 = round(($sR[11]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="11.43968" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve11 = round(($vf11 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="21.939672" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf11) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="15.3577704" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve11) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>LG</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Lama asfáltica Grossa de 1,6cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="13.55" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf0 = round(($sR[0]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="9.485" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve0 = round(($vf0 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="18.190875" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf0) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="12.7336125" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve0) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC 5</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50%+Cim.+Revest.CBUQ 5cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="64.5188" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf12 = round(($sR[12]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="45.16316" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve12 = round(($vf12 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="86.616489" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf12) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="60.6315423" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve12) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>RP</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Reparo Profundo</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="89.664" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf1 = round(($sR[1]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="62.7648" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve1 = round(($vf1 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="120.37392" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf1) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="84.261744" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve1) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC 7</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50%+Cim.+Revest.CBUQ 7cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="76.21072" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf13 = round(($sR[13]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="53.347504" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve13 = round(($vf13 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="102.3128916" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf13) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="71.61902412" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve13) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H3</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 3cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="19.45688" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf2 = round(($sR[2]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="13.619816" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve2 = round(($vf2 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="26.1208614" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf2) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="18.28460298" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve2) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC 8</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50%+Cim.+Revest.CBUQ 8cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="82.43968" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf14 = round(($sR[14]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="57.707776" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve14 = round(($vf14 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="110.6752704" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf14) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="77.47268928" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve14) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H4</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 4cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="25.68584" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf3 = round(($sR[3]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="17.980088" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve3 = round(($vf3 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="34.4832402" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf3) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="24.13826814" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve3) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC 9</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50%+Cim.+Revest.CBUQ 9cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="88.28464" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf15 = round(($sR[15]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="61.799248" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve15 = round(($vf15 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="118.5221292" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf15) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="82.96549044" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve15) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H5</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 5cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="31.9148" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf4 = round(($sR[4]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="22.34036" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve4 = round(($vf4 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="42.845619" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf4) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="29.9919333" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve4) * $iSA,2);?></font></td>
				<td class="class_relatorio_12"  align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="center" valign=bottom><font face="Arial" size=1 color="#FF0000"><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1 color="#00B050"><br></font></td>
				<td class="class_relatorio_2" align="left" valign=bottom><font face="Arial" size=1 color="#00B050"><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H6</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 6cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="37.76176" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf5 = round(($sR[5]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="26.433232" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve5 = round(($vf5 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="50.6951628" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf5) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="35.48661396" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve5) * $iSA,2);?></font></td>
				<td class="class_relatorio_11"  colspan=5 align="center" valign=bottom><font face="Arial" size=1>ACOSTAMENTO - INTERVENÇÃO</font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1><br></font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1 color="#00B050"><br></font></td>
				<td class="class_relatorio_4"   align="left" valign=bottom><font face="Arial" size=1 color="#00B050"><br></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H7</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 7cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="43.60672" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf6 = round(($sR[6]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="30.524704" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve6 = round(($vf6 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="58.5420216" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf6) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="40.97941512" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve6) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>Reest.de base</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Reestabilização d base c/adição Material 50%</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="2.85" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf16 = round(($sR[16]/$aA),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="1.995" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve16 = round(($vf16 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="3.826125" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf16) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="2.6782875" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve16) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H8</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 8cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="49.83568" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf7 = round(($sR[7]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="34.884976" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve7 = round(($vf7 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="66.9044004" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf7) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="46.83308028" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve7) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>TSD</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Tratamento Superficial Duplo</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="9.52" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf17 = round(($sR[17]/$aA),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="6.664" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve17 = round(($vf17 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="12.7806" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf17) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="8.94642" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve17) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H9</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 9cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="55.68064" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf8 = round(($sR[8]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="38.976448" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve8 = round(($vf8 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="74.7512592" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf8) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="52.32588144" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve8) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>TSS</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Tratamento Superficial Simples</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="3.86" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf18 = round(($sR[18]/$aA),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="2.702" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve18 = round(($vf18 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="5.18205" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf18) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="3.627435" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve18) * $iSA,2);?></font></td>
			</tr>
			<tr>
				<td class="class_relatorio_1" height="20" align="center" valign=bottom><font face="Arial" size=1>H10</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recapeamento c/revest.CBUQ 10cm</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="61.5256" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf9 = round(($sR[9]/$aP),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="43.06792" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve9 = round(($vf9 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="82.598118" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf9) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="57.8186826" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve9) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="center" valign=bottom><font face="Arial" size=1>REC</font></td>
				<td class="class_relatorio_1" colspan=4 align="left" valign=bottom><font face="Arial" size=1>Recicl.base c/ad.Mat 50% + Cimento</font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="20.128" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $vf19 = round(($sR[19]/$aA),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom sdval="14.0896" sdnum="1033;0;#,##0.00"><font face="Arial" size=1><?php echo $ve19 = round(($vf19 * $fC),2); ?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="27.02184" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($vf19) * $iSA,2);?></font></td>
				<td class="class_relatorio_1" align="right" valign=bottom bgcolor="#EEECE1" sdval="18.915288" sdnum="1033;0;#,##0.00"><font face="Arial" size=1 color="#00B050"><?php echo round(($ve19) * $iSA,2);?></font></td>
			</tr>
		</table>
		
        </div>        
     </div>
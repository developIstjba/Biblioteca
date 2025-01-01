/**
 * Author:  Jonathan
 * Created: 9 jul. 2023
 */

INSERT INTO `usuario`(`idRol`,`username`, `password`, `cedula`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `correo`, `telefono`, `celular`, `direccion`, `estado`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) 
VALUES (1,'admin','$2y$08$Jnaq5mfYPhqc/wzKi7s5BOiNTVjvZsp5bhFbkkbnwYWSCmocof7Jm','1206039859','Jonathan','Edmidio','Cevallos','Guambuguete','jonathan.cevallos@itsjba.edu.ec','','','Daule',1,NOW(),'SERVER',null,null,null,null)

/*
$modelo->setPassword('admin12345');
*/

INSERT INTO `usuario`(`idRol`,`username`, `password`, `cedula`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `correo`, `telefono`, `celular`, `direccion`, `estado`, `estadoAuditoria`, `fechaIngreso`, `usuarioIngreso`, `fechaModifica`, `usuarioModifica`, `fechaElimina`, `usuarioElimina`) values 
(3,'0914277165','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0914277165','JOSE','LUIS','ALCIVAR','MACIAS','jose.alcivar@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0908903230','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0908903230','JORGE','ENRIQUE','ALVARADO','CHANG','jorge.alvarado@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922091269','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922091269','SORAYA','FRANCISCA','ALVARADO','FIALLO','soraya.alvarado@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0928672674','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0928672674','JENNIFER','LILIBETH','ALVARADO','QUINTO','jennifer.alvarado@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1717891251','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1717891251','DARWIN','VICENTE','APOLO','ROBLES','darwin.apolo@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0940653165','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0940653165','LUIS','NICOLAS','ARBOLEDA','MITE','luis.arboleda@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0914115811','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0914115811','JOSE','VICENTE','ARIAS','LOPEZ','jose.arias@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0929286987','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0929286987','RAQUEL','ARACELY','ASUNCION','PARRALES','raquel.asuncion@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1717147498','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1717147498','MARIA','CLEMENCIA','BALSECA','CORDOVA','maria.balseca@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0920571585','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0920571585','MABEL','ELIZABETH','BARRIGA','PIZARRO','mabel.barriga@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922516927','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922516927','CARLOS','ARMANDO','BARZOLA','IZA','carlos.barzola@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0924563174','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0924563174','KAROL','GABRIEL','BAYONA','MONCAYO','karol.bayona@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922500996','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922500996','JAZMIN','ESTELA','BENITES','MERO','jazmin.benites@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0928674423','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0928674423','KEYLA','XIMENA','BODERO','JIMENEZ','keyla.bodero@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1205911231','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1205911231','INGRID','ELIZABETH','BORJA','PEÑA','ingrid.borja@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0931015093','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0931015093','MARILYN','ANTONIETA','BRIONES','LUCIO','marilyn.briones@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0918701459','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0918701459','ANA','PATRICIA','CABRERA','SANMARTIN','ana.cabrera@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0926566373','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0926566373','RONAL','GREGORIO','CABRERA','PEÑAFIEL','ronald.cabrera@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1204602047','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1204602047','IDA','IVETE','CAMPI','MAYORGA','ida.campi@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1206234799','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1206234799','CHRIS','EMERSON','CASAL','RODRIGUEZ','chris.casal@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0924415664','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0924415664','WENDY','AZUCENA','CASTRO','VAQUE','wendy.castro@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1204345035','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1204345035','EDWIN','PAUL','CASTRO','TORRES','edwin.castro@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0928157049','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0928157049','DIANA','CAROLINA','CEDEÑO','BARRAGAN','diana.cedeno@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'918437138','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','918437138','ZOILA','MELIDA','CEDEÑO','GARCIA','zoila.cedeno@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1206441089','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1206441089','MARLIN','STEFANIA','CEDEÑO','RODRIGUEZ','marlin.cedeno@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1206039859','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1206039859','JONATHAN','EDMIDIO','CEVALLOS','GUAMBUGUETE','jonathan.cevallos@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0603576752','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0603576752','GEOVANNI','DANIEL','CHERREZ','ESCOBAR','geovanni.cherrez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0925163313','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0925163313','PAMELA','DEL ROCIO','COELLO','ORDOÑEZ','pamela.coello@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1309569661','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1309569661','DANNY','SANTIAGO','CORDOVA','GARCIA','danny.cordova@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0909270324','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0909270324','SORAYA','IVONNE','CORDOVA','SCAFF','soraya.cordova@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0912671690','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0912671690','MARLENE','JACQUELINE','CORTEZ','VARGAS','marlene.cortez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0604366591','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0604366591','JHONNY','IVAN','CRUZ','MORETA','jhonny.cruz@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922879721','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922879721','FERNANDO','GADIEL','DOMINGUEZ','RAMOS','fernando.dominguez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0927614610','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0927614610','SILVANA','GABRIELA','ECHEVERRIA','LUNA','silvana.echeverria@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0915989396','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0915989396','PETTER','DARWIN','ECHEVERRIA','MAGGI','petter.echeverria@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922491329','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922491329','EVELYN','CAROLINA','EGUEZ','CAVIEDES','evelyn.eguez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0913745840','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0913745840','JOSE','LUIS','ESCANDON','MOLINA','jose.escandon@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0927134189','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0927134189','CATHERINE','MAGDALENA','FAJARDO','CAMPAÑA','catherine.fajardo@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0921962759','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0921962759','JESSENIA','VANESSA','GONZALEZ','LEON','jessenia.gonzalez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922055405','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922055405','INGRID','PAOLA','GORDILLO','JARA','ingrid.gordillo@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0924671704','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0924671704','ANTONY','ALEXANDERS','HERNANDEZ','LEON','antony.hernandez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0921773610','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0921773610','CHRISTIAN','RICHARD','HERRERA','BOBADILLA','christian.herrera@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0921124764','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0921124764','ANDREINA','VICTORIA','HERRERA','HERRERA','andreina.herrera@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0923364434','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0923364434','RUDDY','LENIN','HOLGUIN','MERO','ruddy.holguin@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0920030962','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0920030962','ANGEL','RAUL','HUAYAMAVE','ROSADO','angel.huayamave@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0927979732','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0927979732','BRIANNIE','HERLINDA','JIMENEZ','VIZUETA','briannie.jimenez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922255195','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922255195','RAYMOND','DAVID','LABANDA','GUEVARA','raymond.labanda@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0926303603','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0926303603','JOSE','ANTONIO','LEON','DELGADO','jose.leon@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0925148280','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0925148280','FRANCIA','ANAHIS','LEYTON','FRANCO','francia.leyton@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0918359001','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0918359001','RENATO','JAVIER','MANZANO','ARAUJO','renato.manzano@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0923577597','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0923577597','CARLOS','AUGUSTO','MARIN','GRANDA','carlos.marin@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1202861900','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1202861900','ZOILA','MIRELLA','MARISCAL','ROSADO','zoila.mariscal@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0925340267','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0925340267','MARCEL','OSWALDO','MENDEZ','MANTUANO','marcel.mendez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0942127374','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0942127374','JONATHAN','EDUARDO','MERINO','GAVILANES','jonathan.merino@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1312162264','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1312162264','ANDRES','ALEXANDER','MINAYA','VERA','andres.minaya@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0923420954','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0923420954','WELLINGTON','ABEL','MOLINA','ANDRADE','wellington.molina@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922493341','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922493341','ALBERTO','ALAIN','MONCAYO','PACHECO','alberto.moncayo@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1205668989','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1205668989','JESSICA','LEONELA','MORA','ROMERO','jessica.mora@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0929564318','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0929564318','JONATHAN','ALEXANDER','MORAN','ALVAREZ','jonathan.moran@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0915232516','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0915232516','CARLOS','RAUL','MUÑOZ','BRAVO','carlos.munoz@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0919678706','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0919678706','MAURICIO','MARCEL','MUÑOZ','MEJIA','mauricio.munoz@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922280003','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922280003','JORGE','ENRIQUE','NAVARRETE','MACIAS','jorge.navarrete@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0605365279','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0605365279','MARIA','JOSE','OCAÑA','COELLO','maria.ocana@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0920163334','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0920163334','MARIUXI','YOMAIRA','OLVERA','MORAN','mariuxi.olvera@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1103815831','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1103815831','ANGEL','MARCELO','ORDOÑEZ','CRESPO','angel.ordonez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0915459010','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0915459010','GLADYS','GIOMAR','ORTIZ','MENENDEZ','gladys.ortiz@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0923089353','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0923089353','FATIMA','ELIZABETH','PALIZ','ROSADO','fatima.paliz@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1204681371','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1204681371','EVELIN','EDDA','PINARGOTE','JUNCO','evelin.pinargote@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0918737438','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0918737438','HECTOR','ALEJANDRO','PINOS','ORTEGA','hector.pinos@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0920521465','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0920521465','JORGE','CHRISTIAN','PLAZA','QUIZHPI','jorge.plaza@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0919094052','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0919094052','ROSA','LILIA','PLUA','MERCHAN','rosa.plua@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0928986389','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0928986389','EVELYN','JESENIA','RIOS','CHICHANDE','evelyn.rios@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0919676320','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0919676320','DAVID','ENRIQUE','ROBELLY','FAJARDO','david.robelly@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0913183760','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0913183760','JORGE','BAYRON','ROBLES','MORAN','jorge.robles@istjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0919936708','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0919936708','JOSE','EDUARDO','ROMERO','MACIAS','jose.romero@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1204595084','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1204595084','ESTELA','JUDITH','ROMERO','RODRIGUEZ','estela.romero@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1206442616','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1206442616','DARIO','XAVIER','ROMERO','SANTISTEVAN','dario.romero@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1206452185','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1206452185','LIGNER','CESIBEL','ROSEL','LUCIO','ligner.rosel@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0929059087','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0929059087','JENNY','LISETTE','RUGEL','VILLAMAR','jenny.rugel@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0917525404','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0917525404','GIOVANNY','FRANCISCO','RUIZ','CARCELEN','giovanny.ruiz@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0926162777','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0926162777','KATHIUSKA','ISABEL','RUIZ','RAMIREZ','kathiuska.ruiz@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0924818388','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0924818388','ALVARO','MANUEL','SALAZAR','RONQUILLO','alvaro.salazar@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0916308406','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0916308406','JAVIER','OCTAVIO','SANCHEZ','CEGARRA','javier.sanchez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922380571','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922380571','ROBERTO','CARLOS','SANTOS','SUAREZ','roberto.santos@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0920371887','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0920371887','MARCO','JULIO','TAMAYO','MIRANDA','marco.tamayo@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0916590607','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0916590607','FAUSTO','XAVIER','TORRES','GALLEGOS','fausto.torresg@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0922427166','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0922427166','FABRICIO','HERNAN','ULLAURI','CASTILLO','fabricio.ullauric@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1307823029','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1307823029','RONALD','DARWIN','VELEZ','ZAMBRANO','ronald.velez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0918440835','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0918440835','MARIUXI','PIEDAD','VINCES','PIVAQUE','mariuxi.vinces@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'0912888088','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','0912888088','MONICA','ARACELY','YEPEZ','MORA','monica.yepez@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null),
(3,'1312538224','$2y$08$z8nowuXLcAvAn2VuUySaY.Fxf8nXY.4GD04pA9lfBaiEsuCcIbOqC','1312538224','CARLOS','MARCELO','ZAMBRANO','BRAVO','carlos.zambrano@itsjba.edu.ec','','','Daule',1,1,NOW(),'SERVER',null,null,null,null);















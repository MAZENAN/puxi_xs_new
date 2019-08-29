<?php
return array (
  'model' => 'FormNode',
  'search' => NULL,
  'usesql' => '1',
  'sql' => 'select * from @pf_form_node where pid<>0 order by belong asc,pid asc,sort asc',
  'sqlargs' => NULL,
  'usingfy' => '1',
  'orderby' => 'belong asc,pid asc,sort asc',
);
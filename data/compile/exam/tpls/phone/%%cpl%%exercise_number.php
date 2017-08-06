                            <?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
                            <li style="border-bottom:1px dotted #CCCCCC;padding:0.5rem;">
                            	<?php echo $quest['questype']; ?>（共<?php echo $this->tpl_var['numbers'][$quest['questid']]; ?>题），选 <input id="question_<?php echo $quest['questid']; ?>" type="text" style="width:6rem;background-color: #fff;height:34px;padding: 1.2rem;border: 1px solid #ccc;border-radius: 4px;" name="args[number][<?php echo $quest['questid']; ?>]" rel="<?php echo $this->tpl_var['numbers'][$quest['questid']]; ?>"/> 题
                            </li>
                        	<?php } ?>
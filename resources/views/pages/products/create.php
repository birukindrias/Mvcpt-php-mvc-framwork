<?php
                        $this->item('forms','/create');
                        $this->item('box_', 'body');
                        $this->item('hidden', 'user_id',$_SESSION['id']);
                        // $this->item('box_', 'ProductPrice');
                        // $this->item('box_', 'ProductAmount', 'number');
                        $this->item('file','post_img');
                        $this->item('button_', 'Post');
                        $this->item('formd');

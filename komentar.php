<?php global $oketheme;
if(empty($oketheme['comment']['act'])) return;
if (comments_open()) { ?>
		
	<div class="box-content" id="komentar" data-customize-partial-id="single" data-helper-title="Komentar" data-helper-tab="single-post">
		<div class="_title"><h4><?php echo $oketheme['comment']['title']?$oketheme['comment']['title'].' ('.get_comments_number().')':sprintf(__('Komentar (%s)'), get_comments_number()); ?></h4></div>
		<div class="comments">
			<?php if (have_comments()) { ?>
				<ul class="comment_text"><?php wp_list_comments( 'type=comment&callback=komentar' ); ?></ul>
			<?php } else { 
				echo '<p>'.__('Saat ini belum ada komentar').'</p>';
			} ?>
			
			<a id="submit-komentar"></a>
			<?php // Form Komentar
				$comment_args = array( 
				'logged_in_as'	=> '',
				'comment_notes_before'	=> '<p class="comment-notes">'.__('Email Anda tidak akan dipublikasikan. Kolom yang bertanda bintang (*) wajib diisi').'</p>',
				'title_reply'=> __('Silahkan tulis komentar Anda'),
				'title_reply_to'=> __('Balas'),
				'cancel_reply_link'=> __('Batal'),
				'fields' => apply_filters( 
					'comment_form_default_fields', array(
						'author' => '
							<p class="comment-form-author">
								<label for="author">'.__('Nama').'*</label>
								<input id="author" name="author" type="text" value="' .esc_attr( $commenter['comment_author'] ). '" size="30" required>
							</p>',   

						'email'  => '
							<p class="comment-form-email">
								<label for="email">'.__('Email').'*</label>
								<input id="email" name="email" type="text" value="' .esc_attr( $commenter['comment_author_email'] ). '" size="30" required>
							</p>'
					)
				),
				'comment_field' => '
					<p class="comment-form-comment">
						<label for="comment">'.__('Komentar').'*</label>
						<textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
					</p>',
				'label_submit' => __('Kirim Komentar'),
				);
				comment_form($comment_args); 
			?>	
		</div>
	</div>
<?php } ?>
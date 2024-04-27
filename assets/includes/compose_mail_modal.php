<?php 
	echo '
	<div>
						<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#compose-mail-modal">
							<span class="bi-pencil"></span> Compose
						</button>
						<!-- compose mail modal -->
						<div class="modal fade" id="compose-mail-modal">
							<div class="modal-dialog modal-fullscreen-sm-down">
								<div class="modal-content">
									<div class="modal-header p-1 pe-2 ps-2">
										<h6 class="modal-title">Compose</h6>
										<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
									</div>
									<div class="modal-body">
										<form id="compose_form" method="POST" action="assets/includes/compose.php" enctype="multipart/form-data" accept-charset="utf-8">
											<div class="d-grid gap-2">
												<div class="input-group">
													<span class="input-group-text" id="from-addon">From</span>
													<input type="email" class="form-control" value="'.$user_email_address.'" aria-describedby="from-addon" disabled>
												</div>
												<div>
													<div class="input-group">
														<span class="input-group-text" id="to-addon">To</span>
														<input id="mail_to" name="mail_to" type="email" class="form-control" aria-describedby="to-addon" placeholder="somebody@'.$project_name.'.com" autocomplete="off" required>
													</div>
													<div id="mail_to_val"></div>
												</div>
												<div>
													<div class="input-group">
														<span class="input-group-text" id="subject-addon">Subject</span>
														<input id="mail_subject" name="mail_subject" type="text" class="form-control" aria-describedby="subject-addon" placeholder="This is a mail" autocomplete="off">	
													</div>
													<div id="mail_subject_val"></div>
												</div>
												<div>
													<textarea class="summernote" name="mail_body" required></textarea>
												</div>
												<div>
													<div class="text-muted">
														<font size="2">
															Tag this mail as an important mail
														</font>
													</div>
													<input name="mail_important" class="form-check-input" type="checkbox" value="yes" id="tag-important">
      												<label class="form-check-label" for="tag-important">
        												Important
      												</label>
												</div>
												<div class="d-grid mb-2">
													<button type="submit" class="btn btn-danger btn-block">Done</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>'
?>
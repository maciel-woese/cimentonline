<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>${msg:chat.window.title.agent}</title>
	<link rel="shortcut icon" href="${webimroot}/images/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="${tplroot}/chat.css" />
</head>
<body class="bgbody">
	<div id="top2">
		<div id="logo">
			${if:ct.company.chatLogoURL}
				${if:webimHost}
					<a onclick="window.open('${page:webimHost}');return false;" href="${page:webimHost}">
						<img src="${page:ct.company.chatLogoURL}" alt=""/>
					</a>
				${else:webimHost}
					<img src="${page:ct.company.chatLogoURL}" alt=""/>
				${endif:webimHost}
			${else:ct.company.chatLogoURL}
				${if:webimHost}
					<a onclick="window.open('${page:webimHost}');return false;" href="${page:webimHost}">
						<img src="${tplroot}/images/default-logo.png" alt=""/>
					</a>
				${else:webimHost}
					<img src="${tplroot}/images/default-logo.png" alt=""/>
				${endif:webimHost}
			${endif:ct.company.chatLogoURL}
			&nbsp;<br />&nbsp;
			<div id="page-title">${msg:chat.redirect.title}</div>
			<div class="clear">&nbsp;</div>
		</div>
	</div>
	<div id="headers">
		<div class="wndb"><div class="wndl"><div class="wndr"><div class="wndt"><div class="wndtl"><div class="wndtr"><div class="wndbl"><div class="wndbr">
			<div class="buttons">
				<a href="javascript:window.close();" title="${msg:chat.redirect.back}"><img class="tplimage iclosewin" src="${webimroot}/images/free.gif" alt="${msg:chat.redirect.back}" /></a>
			</div>
			<div class="messagetxt">${msg:chat.redirect.choose}</div>
		</div></div></div></div></div></div></div></div>
	</div>
	<div id="content-wrapper">
		<div class="left">
			${if:redirectToAgent}
				<strong>${msg:chat.redirect.operator}</strong>
				<ul class="agentlist">
					${page:redirectToAgent}
				</ul>
			${endif:redirectToAgent}
		</div>
		<div class="right">
			${if:redirectToGroup}
				<strong>${msg:chat.redirect.group}</strong>
				<ul class="agentlist">
					${page:redirectToGroup}
				</ul>
			${endif:redirectToGroup}
		</div>
		<div class="clear">%nbsp;</div>
		<div class="center">${pagination}</div>
	</div>
</body>
</html>
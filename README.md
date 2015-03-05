<h1>Hack Commerce - Vulnerable app for learn web security</h1>
<h2>Vulnerabilities</h2>
<p>Some vulnerabilites cover on the talk <a href="http://www.slideshare.net/ginx/web-security-attacks-and-defense">Web Security Attacks and Defense</a></p> using custom vulnerable app from scratch.
<ul>
	<li>
		SQL attacks
		<ul>
			<li>SQL injection (SQLi)</li>
			<li>Blind SQLi</li>
			<li>Server read files</li>
			<li>Upload shell</li>
		</ul>
	</li>
	<li>
		XSS
		<ul>
			<li>Persistent XSS</li>
			<li>Reflected XSS</li>		
			<li>Session hijacking & cookie stealing</li>
			<li>Content Security Police (SCP) in .htaccess</li>
			<li>Cookies activate flag http only</li>
			<li>Cookies under secure channel (https)</li>
		</ul>
	</li>
	
	<li>Full Path Disclosure (FPD)</li>
	<li>Weak passwords hash</li>
	<li>Local File Inclusion</li>
	<li>Bad Inputs Validation</li>
	<li>More bugs, can you search one more? ;)</li>
</ul>

<h2>Deployment</h2>
<p>This vulnerable app (aka hack-commerce) was developed using PHP 5.5.14 under Apache 2.4.9.</p>
<p>To install the app on your computer you need Apache 2 with php.</p>

<ol>
	<li>Create apache virtualhost. You have my copy of virtualhosts under <strong>./deployment/hack-commerce.local</strong> and <strong>./deployment/evil-domain.local</strong></li>
	<li>Restore database data. Import <strong>./deployment/hackcommerce.sql</strong> and edit <strong>./core/autoload.php</strong> with your mysql credentials</li>
</ol>


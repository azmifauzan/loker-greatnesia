<?php
echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<rss version="2.0"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title><?php echo $feed_name; ?></title>
<link><?php echo $feed_url; ?></link>
<atom:link href="<?php echo $feed_url; ?>" rel="self" type="application/rss+xml" />
<description><?php echo $page_description; ?></description>
<dc:language><?php echo $page_language; ?></dc:language>
<dc:creator><?php echo $creator_email; ?></dc:creator>
<dc:rights>Copyright <?php echo gmdate("Y", time()); ?>
</dc:rights>
<admin:generatorAgent rdf:resource="http://www.codeigniter.com/" />

<?php foreach($query->result() as $row):?>
<item>
<title><?php echo htmlspecialchars($row->judul); ?></title>
<link><?php echo site_url('info/view/'.$row->lid.'/'.url_title(strtolower($row->judul))); ?></link>
<guid><?php echo site_url('info/view/'.$row->lid); ?></guid>
<description><![CDATA[ <?php echo $row->deskripsi; ?> ]]></description>
<pubDate><?php echo date('D, d M Y H:i:s O',strtotime($row->upload_time)); ?></pubDate>
</item>
<?php endforeach; ?>

</channel>
</rss>
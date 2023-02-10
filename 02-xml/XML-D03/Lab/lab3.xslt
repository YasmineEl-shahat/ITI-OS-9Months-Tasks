<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:fn="http://www.w3.org/2005/xpath-functions" xmlns:xdt="http://www.w3.org/2005/xpath-datatypes">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
		<xsl:template match="xslTutorial">
			<html>
				<head>
					<title></title>
				</head>
				<body>
					<xsl:for-each select="//number">				
						<span><xsl:value-of select="." /></span>
						<xsl:choose>
							<xsl:when test="position() = last()"> =
							</xsl:when>
							<xsl:otherwise>+</xsl:otherwise>
						</xsl:choose>
					</xsl:for-each>
					<span><xsl:value-of select="sum(number)" /></span>
					<br />
					<xsl:for-each select="//number[. mod(2) = 0 ]">			
						<span><xsl:value-of select="." /></span>
						<xsl:choose>
							<xsl:when test="position() = last()"> =
							</xsl:when>
							<xsl:otherwise>+</xsl:otherwise>
						</xsl:choose>
					</xsl:for-each>
					<span><xsl:value-of select="sum(//number[. mod(2) = 0 ] )" /></span>
					<br />
						<xsl:for-each select="//number[. mod(2) = 1 ]">			
						<span><xsl:value-of select="." /></span>
						<xsl:choose>
							<xsl:when test="position() = last()"> =
							</xsl:when>
							<xsl:otherwise>+</xsl:otherwise>
						</xsl:choose>
					</xsl:for-each>
					<span><xsl:value-of select="sum(//number[. mod(2) = 1 ] )" /></span>
					<br />
				</body>
			</html>
		</xsl:template>s
</xsl:stylesheet>

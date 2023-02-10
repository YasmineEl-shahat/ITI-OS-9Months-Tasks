<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:fn="http://www.w3.org/2005/xpath-functions" xmlns:xdt="http://www.w3.org/2005/xpath-datatypes">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
		<xsl:template match="CATALOG">
			<html>
				<body>
					<table  cellspacing="5" cellpadding="5" align="center" border="1">
						<tbody>
							<tr>
								<th>TITLE</th>
								<th>ARTIST</th>
								<th>PRICE</th>
							</tr>
							<xsl:for-each select="//CD">
							<xsl:sort select="number(PRICE)" order="descending" />
								<xsl:choose>
									<xsl:when test="PRICE &gt; number(10)">
										<tr bgcolor="lightpink">
											<td><xsl:value-of select="TITLE" /></td>
											<td><xsl:value-of select="ARTIST" /></td>
											<td><xsl:value-of select="PRICE" /></td>	
										</tr>
									</xsl:when>
									<xsl:when test="PRICE &lt; number(10)">
										<tr bgcolor="lightgray">
											<td><xsl:value-of select="TITLE" /></td>
											<td><xsl:value-of select="ARTIST" /></td>
											<td><xsl:value-of select="PRICE" /></td>	
										</tr>
									</xsl:when>
									<xsl:otherwise>
											<tr bgcolor="lightgreen">
												<td><xsl:value-of select="TITLE" /></td>
												<td><xsl:value-of select="ARTIST" /></td>
												<td><xsl:value-of select="PRICE" /></td>		
											</tr>
									</xsl:otherwise>
								</xsl:choose>
							</xsl:for-each>
						</tbody>
					</table>
				</body>
			</html>
	</xsl:template>
</xsl:stylesheet>

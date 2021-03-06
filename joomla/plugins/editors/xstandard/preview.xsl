<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:joomla="http://joomla.com" exclude-result-prefixes="joomla" version="1.0">
	<!-- =====================================================================================================
	Copyright (c) 2004  Belus Technology Inc.  All rights reserved.
	====================================================================================================== -->
	<xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>

	<xsl:param name="lang">en</xsl:param>
	<xsl:param name="document-id"></xsl:param>
	<xsl:param name="user-id"></xsl:param>
	<xsl:param name="session-id"></xsl:param>
	<xsl:param name="transaction-id"></xsl:param>
	<xsl:param name="client-id"></xsl:param>
	<xsl:param name="instance-id"></xsl:param>
	<xsl:param name="tag-id"></xsl:param>
	<xsl:param name="zone-id"></xsl:param>
	<xsl:param name="project-id"></xsl:param>
	<xsl:param name="area-id"></xsl:param>
	<xsl:param name="group-id"></xsl:param>
	<xsl:param name="parent-id"></xsl:param>
	<xsl:param name="container-id"></xsl:param>
	<xsl:param name="object-id"></xsl:param>
	
	<xsl:variable name="ucase">ABCDEFGHIJKLMNOPQRSTUVWXYZ</xsl:variable>
	<xsl:variable name="lcase">abcdefghijklmnopqrstuvwxyz</xsl:variable>

	<xsl:template match="/">
		<xsl:text disable-output-escaping="yes">
			<![CDATA[
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
				<!-- saved from url=(0021)http://xstandard.com/ -->
			]]>
		</xsl:text>
		
		<xsl:apply-templates/>
	</xsl:template>

	<!-- =================================================================================================
	joomla:image
	================================================================================================== -->
	<xsl:template match="joomla:image">
		<img src="http://www.joomla.org/images/logos/Thumbnails/Joomla%20Logo%20Horz%20Color%20Rev%20Thumbnail.png" alt="Joomla!" width="150" height="30" />
	</xsl:template>


	<!-- =================================================================================================
	joomla:readmore
	================================================================================================== -->
	<xsl:template match="joomla:readmore">
		<a href="#" onclick="return false;" onkeypress="return false;">Read more...</a>
	</xsl:template>


	<!-- =================================================================================================
	joomla:pagebreak
	================================================================================================== -->
	<xsl:template match="joomla:pagebreak">
		<hr style="border-top:3px dashed black" />
	</xsl:template>


	<!-- =================================================================================================
	Hyperlinks
	================================================================================================== -->
	<xsl:template match="a[@href]">
		<xsl:element name="a">
			<xsl:if test="@href">
				<xsl:attribute name="href"><xsl:value-of select="@href"/></xsl:attribute>
				<xsl:attribute name="onclick">return false;</xsl:attribute>
				<xsl:attribute name="onkeypress">return false;</xsl:attribute>
			</xsl:if>
			<xsl:if test="@id">
				<xsl:attribute name="id"><xsl:value-of select="@id"/></xsl:attribute>
			</xsl:if>
			<xsl:if test="@style">
				<xsl:attribute name="style"><xsl:value-of select="@style"/></xsl:attribute>
			</xsl:if>
			<xsl:if test="@class">
				<xsl:attribute name="class"><xsl:value-of select="@class"/></xsl:attribute>
			</xsl:if>
			<xsl:choose>
				<xsl:when test="string(@title) = ''">
					<xsl:attribute name="title"><xsl:value-of select="@href"/></xsl:attribute>
				</xsl:when>
				<xsl:otherwise>
					<xsl:attribute name="title"><xsl:value-of select="@title"/></xsl:attribute>
				</xsl:otherwise>
			</xsl:choose>
			<xsl:apply-templates/>
		</xsl:element>
	</xsl:template>

	<!-- =================================================================================================
	Match any node
	================================================================================================== -->
	<xsl:template match="*">
		<xsl:variable name="lcase-elt-name"><xsl:value-of select="translate(name(), $ucase, $lcase)"/></xsl:variable>
		<xsl:if test="$lcase-elt-name != 'script' and $lcase-elt-name != 'meta' and $lcase-elt-name != 'link' and $lcase-elt-name != 'iframe'">
			<xsl:choose>
				<xsl:when test="$lcase-elt-name = 'br' or $lcase-elt-name = 'hr' or $lcase-elt-name = 'base' or $lcase-elt-name = 'img' or $lcase-elt-name = 'input'">
					<!-- process emtpy elements -->
					
					<xsl:variable name="element"><xsl:value-of select="name()"/></xsl:variable>
					<xsl:variable name="attributes">
						<xsl:for-each select="attribute::*">
							<xsl:variable name="lcase-attr-name"><xsl:value-of select="translate(name(), $ucase, $lcase)"/></xsl:variable>
							<xsl:if test="$lcase-attr-name != 'onclick' and $lcase-attr-name != 'ondblclick' and $lcase-attr-name != 'onmousedown' and $lcase-attr-name != 'onmouseup' and $lcase-attr-name != 'onmouseover' and $lcase-attr-name != 'onmousemove' and $lcase-attr-name != 'onmouseout' and $lcase-attr-name != 'onkeypress' and $lcase-attr-name != 'onkeydown' and $lcase-attr-name != 'onkeyup' and $lcase-attr-name != 'onload' and $lcase-attr-name != 'onunload'">
								<xsl:text> </xsl:text><xsl:value-of select="name()"/><xsl:text>="</xsl:text><xsl:value-of select="."/><xsl:text>"</xsl:text>
							</xsl:if>
						</xsl:for-each>
					</xsl:variable>
					<xsl:text disable-output-escaping="yes">&lt;</xsl:text><xsl:value-of select="$element"/><xsl:value-of select="$attributes" /><xsl:text disable-output-escaping="yes"> /&gt;</xsl:text>
				</xsl:when>
				<xsl:otherwise>
					<!-- process non-empty elements -->
					
					<xsl:element name="{name()}">
						<xsl:for-each select="attribute::*">
							<xsl:variable name="lcase-attr-name"><xsl:value-of select="translate(name(), $ucase, $lcase)"/></xsl:variable>
							<xsl:if test="$lcase-attr-name != 'onclick' and $lcase-attr-name != 'ondblclick' and $lcase-attr-name != 'onmousedown' and $lcase-attr-name != 'onmouseup' and $lcase-attr-name != 'onmouseover' and $lcase-attr-name != 'onmousemove' and $lcase-attr-name != 'onmouseout' and $lcase-attr-name != 'onkeypress' and $lcase-attr-name != 'onkeydown' and $lcase-attr-name != 'onkeyup' and $lcase-attr-name != 'onload' and $lcase-attr-name != 'onunload'">
								<xsl:attribute name="{name()}"><xsl:value-of select="."/></xsl:attribute>
							</xsl:if>
						</xsl:for-each>

						<xsl:apply-templates/>
					</xsl:element>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:if>
	</xsl:template>

	<!-- =====================================================================================================
	Match any text
	====================================================================================================== -->
	<xsl:template match="text()">
		<xsl:value-of select="."/>
	</xsl:template>
</xsl:stylesheet>

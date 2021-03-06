package com.guitariffic.dao.fakesheet.adapter;

import java.io.File;
import java.io.IOException;

import org.docx4j.openpackaging.exceptions.Docx4JException;
import org.docx4j.openpackaging.packages.WordprocessingMLPackage;

import com.guitariffic.dao.fakesheet.BaseAdapter;
import com.guitariffic.model.FakeSheet;

public class DOCXAdapter extends BaseAdapter
{

	@Override
	public Object openFile(File file) throws IOException, ClassNotFoundException
	{
		return null;
	}

	@Override
	public void saveFile(Object o, File file) throws IOException
	{

		DOCX4JAdapter documentGetter = new DOCX4JAdapter();
		WordprocessingMLPackage wordMLPackage = documentGetter.generateDocument((FakeSheet) o);
		// Now save it
		try
		{
			wordMLPackage.save(file);
		} catch (Docx4JException e)
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}
}
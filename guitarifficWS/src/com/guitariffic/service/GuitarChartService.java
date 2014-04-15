package com.guitariffic.service;

import com.guitariffic.model.GuitarChart;
import com.guitariffic.service.exception.GuitarChartAlreadyExists;
import com.guitariffic.service.exception.GuitarChartNotFound;

public interface GuitarChartService {

	public abstract String add(GuitarChart chart) throws GuitarChartAlreadyExists;

	public abstract String update(GuitarChart chart, String id) throws GuitarChartNotFound;

	public abstract void delete(String id) throws GuitarChartNotFound;

	public abstract String[] getList(String search);

	public abstract GuitarChart get(String id) throws GuitarChartNotFound;

}
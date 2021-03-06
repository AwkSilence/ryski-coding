/**
 author: Ryszard Kilarski
 email: emrys@bu.edu
 bu id: U81-39-8560
 */
package com.guitariffic.dbo;

import java.util.List;

import com.guitariffic.model.GuitarChart;

/**
 * Interface to expose database functionality for guitar charts.
 */
public interface GuitarChartDBHelper {
	public String add(GuitarChart object);

	public void delete(String id);

	public GuitarChart get(String id);

	public List<GuitarChart> getList(String search);

	public void update(GuitarChart object, String id);
}
